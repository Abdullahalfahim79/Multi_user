<div class="mb-3">
    <label class="form-label">Category name</label>
    <input type="text" name="category_name" value="{{ old('category_name', $category->category_name ?? '') }}" required
           class="form-control @error('category_name') is-invalid @enderror">
    @error('category_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" rows="3"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description ?? '') }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
