<?php

namespace App\Http\Controllers;

use App\Models\IssueCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IssueCategoryController extends Controller
{
    
    public function index(Request $request)
    {
        $categories = IssueCategory::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->when($request->filled('type'), function ($query) use ($request) {
                $query->where('type', $request->type);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $types = IssueCategory::TYPES;

        return view('categories.index', compact('categories', 'types'));
    }

    
    public function create()
    {
        return view('categories.create', [
            'types'      => IssueCategory::TYPES,
            'priorities' => IssueCategory::PRIORITIES,
        ]);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        IssueCategory::create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Kategori masalah berhasil ditambahkan!');
    }

    
    public function show(IssueCategory $category)
    {
        return view('categories.show', compact('category'));
    }

    
    public function edit(IssueCategory $category)
    {
        return view('categories.edit', [
            'category'   => $category,
            'types'      => IssueCategory::TYPES,
            'priorities' => IssueCategory::PRIORITIES,
        ]);
    }

    
    public function update(Request $request, IssueCategory $category)
    {
        $validated = $request->validate($this->rules($category));

        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Kategori masalah berhasil diperbarui!');
    }

    
    public function destroy(IssueCategory $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Kategori masalah berhasil dihapus!');
    }

    
    private function rules(?IssueCategory $category = null): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('issue_categories', 'name')->ignore($category?->id),
            ],
            'type'        => ['required', Rule::in(IssueCategory::TYPES)],
            'priority'    => ['required', Rule::in(IssueCategory::PRIORITIES)],
            'description' => ['nullable', 'string', 'max:500'],
        ];
    }
}