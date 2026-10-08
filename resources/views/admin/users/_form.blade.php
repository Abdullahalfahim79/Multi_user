<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required
           class="form-control @error('name') is-invalid @enderror">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required
           class="form-control @error('email') is-invalid @enderror">
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Password {{ isset($user) ? '(leave blank to keep current)' : '' }}</label>
    <input type="password" name="password" {{ isset($user) ? '' : 'required' }}
           class="form-control @error('password') is-invalid @enderror">
    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Confirm password</label>
    <input type="password" name="password_confirmation" class="form-control">
</div>
<div class="form-check mb-3">
    <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin" value="1"
           {{ old('is_admin', $user->is_admin ?? false) ? 'checked' : '' }}
           {{ isset($user) && $user->id === auth()->id() ? 'disabled' : '' }}>
    <label class="form-check-label" for="is_admin">Administrator</label>
    @if(isset($user) && $user->id === auth()->id())
        <div class="form-text">You cannot change your own role.</div>
    @endif
</div>
