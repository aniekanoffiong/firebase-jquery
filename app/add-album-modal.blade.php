<div class="modal fade" id="albumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header no-border-bottom">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center bold" id="myModalLabel">Add Album</h4>
                </div>
                <form action="{{ add_album_route() }}" method="post" id="album-create-form" enctype="multipart/form-data">
                    
                    {{ csrf_field() }}

                    <input type="hidden" name="from_songs" value="0">

                    <div class="modal-body">
                        @if (Auth::user()->hasRole('label'))
                            <div class="form-group col-md-6">
                                <label for="" class="control-label">Select Artiste</label>
                                @if ($artistes->count())
                                    <select name="artiste" class="form-control form-control-line">
                                        @foreach ($artistes as $artiste)
                                            <option value="{{ $artiste->id }}">{{ $artiste->user->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        @else
                            <input type="hidden" name="artiste" value="{{ Auth::user()->id }}" >
                        @endif
                        <div class="form-group col-md-6">
                            <label for="" class="control-label">Album Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-line" placeholder="Album Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description" class="control-label">Description</label>
                            <textarea rows="3" id="description" class="form-control form-control-line" name="description" placeholder="Album Description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="control-label">Release Year</label>
                            <select name="release_year" class="form-control form-control-line">
                                @for ($year = 1970; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}" @if ($year == date('Y')) selected @endif>{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="control-label">Album Cover Art</label>
                            <input type="file" name="cover_art" class="photo-upload-preview inline">

                            <div class="row photo-container hidden">
                                <div class="preview-file bg-white">
                                    <img id="category-image" class="img-responsive img-preview" height="100"/>
                                    <div class="after">
                                        <span class="zoom">
                                            <i class="fa fa-times text-red"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-border-top text-center">
                        <button type="button" class="btn btn-danger inline" data-dismiss="modal">Cancel</button>
                        <button type="button" type="submit" class="btn btn-primary inline" id="create-album">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>