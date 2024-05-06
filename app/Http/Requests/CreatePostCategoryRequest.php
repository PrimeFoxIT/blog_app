<?php

namespace App\Http\Requests;

use App\ValueObjects\PostCategoryObject;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|min:12|string',
            'parent_id' => 'nullable|string',
        ];
    }

    public function getPostCategoryObject(): PostCategoryObject
    {
        return new PostCategoryObject(
            name: $this->input('name'),
            description: $this->input('description'),
            parentId: $this->input('parent_id'),
        );
    }
}
