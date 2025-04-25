div class="form-group">
<label for="source_name">Source Name</label>
<input type="text" name="source_name" id="source_name" class="form-control"
    value="{{ old('source_name', $referralSource->source_name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="active" {{ old('status', $referralSource->status ?? '') == 'active' ? 'selected' : '' }}>Active
        </option>
        <option value="inactive" {{ old('status', $referralSource->status ?? '') == 'inactive' ? 'selected' : ''
            }}>Inactive</option>
    </select>
</div>