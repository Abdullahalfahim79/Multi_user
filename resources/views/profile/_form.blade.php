<div class="mb-3">
    <label class="form-label">Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
           class="form-control @error('phone') is-invalid @enderror">
    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Address</label>
    <textarea name="address" rows="3"
              class="form-control @error('address') is-invalid @enderror">{{ old('address', $profile->address ?? '') }}</textarea>
    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Profile image</label>
    @if(!empty($profile->profile_image))
        <div class="mb-2"><img src="{{ asset('storage/'.$profile->profile_image) }}" class="avatar" alt="Profile image"></div>
    @endif
    <input type="file" name="profile_image" accept="image/*"
           class="form-control @error('profile_image') is-invalid @enderror">
    @error('profile_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
    <div class="form-text">JPG, PNG or WEBP, up to 2 MB.</div>
</div>
