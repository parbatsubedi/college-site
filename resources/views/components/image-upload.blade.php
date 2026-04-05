@props([
    'name' => 'image',
    'currentImage' => null,
    'label' => 'Image',
    'path' => 'courses',
    'helpText' => 'Upload image (max 2MB, formats: jpg, png, gif, webp)'
])

<div class="image-upload-component">
    <label class="form-label">{{ $label }}</label>
    
    @if($currentImage)
    <div class="current-image-preview mb-2">
        <img src="{{ asset('storage/' . $path . '/' . $currentImage) }}" alt="Current {{ strtolower($label) }}" class="img-preview" style="max-width: 200px; max-height: 150px; border-radius: 8px; border: 1px solid var(--border-color); object-fit: cover;">
        <p class="help-text mt-1">Current image</p>
    </div>
    @endif
    
    <div class="upload-area" style="border: 2px dashed var(--border-color); border-radius: 8px; padding: 20px; text-align: center; cursor: pointer; transition: all 0.3s; position: relative;" onclick="document.getElementById('file-{{ $name }}').click();" ondragover="event.preventDefault(); this.style.borderColor='var(--primary-color)'; this.style.background='rgba(79,70,229,0.05)';" ondragleave="this.style.borderColor='var(--border-color)'; this.style.background='';" ondrop="event.preventDefault(); this.style.borderColor='var(--border-color)'; this.style.background=''; handleFileDrop(event, '{{ $name }}');">
        <div id="preview-{{ $name }}" class="new-image-preview" style="display: none; margin-bottom: 10px;">
            <img src="" alt="Preview" style="max-width: 200px; max-height: 150px; border-radius: 8px; border: 1px solid var(--border-color); object-fit: cover;">
        </div>
        <div id="placeholder-{{ $name }}">
            <i class="fas fa-cloud-upload-alt" style="font-size: 32px; color: var(--text-muted); margin-bottom: 10px;"></i>
            <p style="color: var(--text-muted); margin: 0; font-size: 14px;">Click to upload or drag & drop</p>
        </div>
        <input type="file" name="{{ $name }}" id="file-{{ $name }}" class="d-none" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" onchange="previewImage(this, '{{ $name }}')">
    </div>
    <small class="help-text">{{ $helpText }}</small>
</div>

<script>
function previewImage(input, name) {
    const preview = document.getElementById('preview-' + name);
    const placeholder = document.getElementById('placeholder-' + name);
    const img = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function handleFileDrop(event, name) {
    const input = document.getElementById('file-' + name);
    input.files = event.dataTransfer.files;
    previewImage(input, name);
}
</script>

<style>
.image-upload-component .upload-area:hover {
    border-color: var(--primary-color);
    background: rgba(79, 70, 229, 0.05);
}
</style>
