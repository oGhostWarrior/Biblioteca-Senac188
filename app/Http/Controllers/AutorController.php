<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AutorController extends Controller
{
    public function index(Request $request)
    {
        $query = Autor::query();

        if ($request->filled('search')) {
            $query->where('nome', 'like', '%' . $request->input('search') . '%');
        }

        $autors = $query->paginate(10);

        return view('Autor.index', compact('autors'));
    }

    public function create()
    {
        return view('autor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'biografia' => 'required',
            'data_nasc' => 'required|date', // Validação de data
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Debug: Mostre os dados recebidos
        \Log::info('Dados recebidos: ', $request->all());

        $autor = new Autor;
        $autor->nome = $request->nome;
        $autor->biografia = $request->biografia; 
        $autor->data_nasc = $request->data_nasc; 

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('autors', 'public');
            $autor->foto = $path;
        }

        try {
            $autor->save();
        } catch (\Exception $e) {
            \Log::error('Erro ao criar autor: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao criar autor: ' . $e->getMessage());
        }

        return redirect()->route('autors.index')->with('success', 'Autor criado com sucesso!');
    }

    public function show(Autor $autor)
    {
        return view('autor.show', compact('autor'));
    }

    public function edit(Autor $autor)
    {
        return view('autor.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'nome' => 'required',
            'biografia' => 'required',
            'data_nasc' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adicionada validação para foto
        ]);
    
        // Atualiza os campos que não são a foto
        $autor->nome = $request->nome;
        $autor->biografia = $request->biografia;
        $autor->data_nasc = $request->data_nasc;
    
        // Verifica se uma nova foto foi enviada
        if ($request->hasFile('foto')) {
            // Remove a foto antiga, se necessário
            if ($autor->foto) {
                Storage::disk('public')->delete($autor->foto);
            }
            
            // Armazena a nova foto
            $path = $request->file('foto')->store('autors', 'public');
            $autor->foto = $path;
        }
    
        // Salva as alterações no banco de dados
        $autor->save();
    
        return redirect()->route('autors.index')->with('success', 'Autor atualizado com sucesso.');
    }

    public function destroy(Autor $autor)
    {
        $autor->delete();
        return redirect()->route('autors.index')->with('success', 'Autor deletado com sucesso.');
    }
}