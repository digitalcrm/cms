<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Media
                        <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Add New
                        </button>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="collapse" id="collapseExample">
                        <livewire:media.gallary-upload />
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header row">
                            <div class="col">
                                <a href="{{ route('gallaries.index') }}" class="m-2"><i class="fas fa-th"></i></a>
                                <a href="{{ route('gallaries.index', ['lists'=>'true']) }}" class="m-2"><i class="fas fa-list"></i></a>
                            </div>
                            @if(!(request('lists') === 'true'))
                            <div class="col">
                                <div class="input-group">
                                    <input wire:model="searchInput" type="search" name="searchInput"
                                        placeholder="Search for..." class="form-control form-control-sm float-right"
                                        id="searchInput">
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            @if(request('lists') === 'true')
                                @include('gallary.lists-view')
                            @else
                                @include('gallary.grid-view')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="mediamodal" tabindex="-1" aria-labelledby="mediamodalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediamodalLabel">Attachment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col-7">
                        <img src="{{ $this->file_path }}" alt="{{ $this->file_name }}" class="img-fluid">
                    </div>
                    <div class="col-5">
                        <div>
                            <strong>File name: </strong> {{ $this->file_name }}
                        </div>
                        <div>
                            <strong>File type: </strong> {{ $this->mime_type }}

                        </div>
                        <div>
                            <strong>Uploaded on: </strong> {{ $this->created_at }}

                        </div>
                        <div>
                            <strong>File size: </strong> {{ $this->size }}
                        </div>
                        <div>
                            <strong>Dimension: </strong> {{ $this->dimension }}
                        </div>
                        <div>
                            <strong>Copy Link: </strong>
                            <input id="copyLink" type="text" class="form-control" value="{{ $this->file_path }}"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="myFunction()">Copy Link</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {

            /* Get the text field */
            const copyText = document.getElementById("copyLink").select();

            /* Copy the text inside the text field */
            const copied = document.execCommand("copy");

            successMessage(copied);
        }

        function successMessage(variable) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            if (variable) {
                Toast.fire({
                    icon: 'success',
                    title: 'URL copied'
                })
            }
        }
    </script>
    <script>
        // console.log(window.innerHeight, window.scrollY);
        window.onscroll = function(event) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('mediaLoad');
            }
        };
    </script>
</div>
