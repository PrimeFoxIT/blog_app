<?php

namespace App\Http\Requests;

use App\ValueObjects\PostObject;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:12'],
            'tags' => ['array'],
            'tags.*' => ['string'],
            'category_id' => ['required', 'string', 'max:255'],
            'published_at' => ['date', 'nullable'],
            'thumbnail' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'nullable'],
        ];
    }

    public function getPostObject(): PostObject
    {
        return new PostObject(
            title: $this->input('title'),
            content: $this->input('content'),
            tags: $this->input('tags'),
            category_id: $this->input('category_id'),
            published_at: $this->input('published_at'),
            thumbnail: $this->file('thumbnail'),
        );
    }
}
