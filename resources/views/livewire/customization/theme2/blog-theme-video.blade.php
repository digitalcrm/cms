<div>
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
                <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header text-primary font-weight-bold">Video</div>
        <div class="card-body">
            @if($wants_to_update)
                <form wire:submit.prevent="video_update({{ $rowId }})">
                @else
                    <form wire:submit.prevent="store">
            @endif
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="heading">Hedaing</label>
                                    <input wire:model="heading" type="text" class="form-control" id="heading"
                                        aria-describedby="emailHelp">
                                    @error('heading')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="paragraph">Text</label>
                                    <textarea wire:model="paragraph" class="form-control" id="paragraph"
                                        rows="3"></textarea>
                                    @error('paragraph')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image">Video</label>
                                    <input wire:model="image" type="file" class="form-control-file"
                                        id="image{{ $iteration }}">
                                    <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                        only</small>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div wire:loading wire:target="image">Uploading...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-right">
                            <button wire:click="resetAll" type="button" class="btn btn-outline-secondary">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                {{ ($wants_to_update) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row mt-2">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Video</th>
                            <th>Heading</th>
                            <th>Paragraph</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($slider_videos as $video)
                            <tr>
                                <td>
                                    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" width="50px" height="50px">
                                        <source src="{{ $video->imageUrl() }}" type="video/mp4">
                                    </video>
                                    {{-- <img src="{{ $video->imageUrl() }}" alt="video-{{ $video->id }}"
                                        width="35px" height="35px"> --}}
                                </td>
                                <td>{{ $video->heading }}</td>
                                <td>{{ $video->paragraph }}</td>
                                <td>
                                    <a wire:click="status({{ $video->id }})" class="btn btn-link">
                                        {!! ($video->isActive === 1) ? '<i class="fas fa-toggle-on fa-2x"></i>' : '<i
                                            class="fas fa-toggle-off fa-2x"></i>' !!}
                                    </a>
                                </td>
                                <td>
                                    <button wire:click="edit({{ $video->id }})" class="btn btn-primary">Edit</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" align="center">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
