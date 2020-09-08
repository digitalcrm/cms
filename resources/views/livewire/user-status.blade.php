<div>
    <input type="checkbox" name="status" id="status" wire:click="updateStatus({{ $user->id}})" {{ ($user->isActive == 1) ? 'checked' : '' }}>
</div>
