<?php
declare(strict_types=1);
namespace App\Http\Requests;

use App\ValueObjects\TagObject;
use Illuminate\Foundation\Http\FormRequest;

class EditTagRequest extends FormRequest
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
        ];
    }

    public function getTagData(): TagObject
    {
        return new TagObject(
            $this->input('name')
        );
    }
}
