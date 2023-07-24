<div>
    <div class="container">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" wire:model.lazy="name">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" wire:model.lazy="email">
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                      wire:model.lazy="message"></textarea>
            @error('message')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="button" class="btn btn-primary" wire:click="store" wire>Submit</button>

        <hr>
        <livewire:contact-list/>

        <div class="modal fade" id="deletePrompt" tabindex="-1" aria-labelledby="deletePromptLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePromptLabel">Delete Contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('Are you sure you want to delete this contact?') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" wire:click="deleteContact({{ $contactId }})">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
