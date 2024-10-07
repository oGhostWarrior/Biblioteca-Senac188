<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        $query = Livro::query();

        if ($request->filled('search')) {
            $query->where('titulo', 'like', '%' . $request->input('search') . '%');
        }

        $livros = $query->paginate(10);

        return view('Livro.index', compact('livros'));
    }

    public function create()
    {
        return view('livro.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descicao' => 'required',
            'data_pub' => 'required|date',
            'categoria_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Debug: Mostre os dados recebidos
        \Log::info('Dados recebidos: ', $request->all());

        $livro = new Livro;
        $livro->titulo = $request->titulo;
        $livro->descicao = $request->descicao; 
        $livro->data_pub = $request->data_pub;
        $livro->categoria_id = $request->categoria_id;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('livros', 'public');
            $livro->foto = $path;
        }

        try {
            $livro->save();
        } catch (\Exception $e) {
            \Log::error('Erro ao criar Livro: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao criar Livro: ' . $e->getMessage());
        }

        return redirect()->route('livros.index')->with('success', 'Livro criado com sucesso!');

    }
    
    public function show(Livro $livro)
    {
        return view('livro.show', compact('livro'));
    }

    public function edit(Livro $livro)
    {
        return view('livro.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'titulo' => 'required',
            'descicao' => 'required',
            'data_pub' => 'required|date',
            'categoria_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adicionada validação para foto
        ]);

        // Atualiza os campos que não são a foto
        $livro->titulo = $request->titulo;
        $livro->descicao = $request->descicao;
        $livro->data_pub = $request->data_pub;
        $livro->categoria_id = $request->categoria_id;

        // Verifica se uma nova foto foi enviada
        if ($request->hasFile('foto')) {
            // Remove a foto antiga, se necessário
            if ($livro->foto) {
                Storage::disk('public')->delete($livro->foto);
            }
            
            // Armazena a nova foto
            $path = $request->file('foto')->store('livros', 'public');
            $livro->foto = $path;
        }
    
        // Salva as alterações no banco de dados
        $livro->save();
    
        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro deletado com sucesso.');
    }
}
