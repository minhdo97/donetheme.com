@extends('admin.layouts.contentLayoutMaster')
@section('title', 'Post Create')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap"
        rel="stylesheet">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('alert-error'))
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Errors</h4>
                                <div class="alert-body">
                                    {{ session()->get('alert-error') }}
                                </div>
                            </div>
                        @endif
                        <form class="form" action="{{route('admin.posts.store')}}" method="POST"
                              enctype="multipart/form-data"> @csrf
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="title-column">Title</label>
                                        <input
                                            type="text"
                                            id="title-column"
                                            class="form-control"
                                            placeholder="Title"
                                            name="title"
                                            value="{{old('title')}}"
                                        />
                                        @error('title')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label for="image" class="form-label">Image</label>
                                        <input class="form-control" name="image" type="file" id="image"/>
                                        @error('image')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="select2-status">Status</label>
                                        <select class="select2 form-select" name="status" id="select2-status">
                                            <option selected value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="select2-category_id">Category</label>
                                        <select class="select2 form-select" name="category_id" id="select2-category_id">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Body</label>
                                        <div id="full-wrapper">
                                            <div id="full-container">
                                                <div class="editor"></div>
                                                <textarea style="display: none" id="bodyHtml"
                                                          name="body">{!! old('body') !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="seo-title-column">Seo Title</label>
                                        <input
                                            type="text"
                                            id="seo-title-column"
                                            class="form-control"
                                            placeholder="Title"
                                            name="seo_title"
                                            value="{{old('seo_title')}}"
                                        />
                                        @error('seo_title')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="seo-desc-column">Seo DESC</label>
                                        <textarea
                                            class="form-control"
                                            id="seo-desc-column"
                                            rows="3"
                                            name="seo_description"
                                            placeholder="Textarea"
                                        >{!! old('seo_description') !!}</textarea>
                                        @error('seo-desc')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="seo-title-column">Seo Keywords</label>
                                        <input
                                            type="text"
                                            id="seo-keywords-column"
                                            class="form-control"
                                            placeholder="Title"
                                            name="seo_keywords"
                                            value="{{old('seo_keywords')}}"
                                        />
                                        @error('seo_keywords')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
    <script>
        (function (window, document, $) {
            'use strict';
            var Font = Quill.import('formats/font');
            Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
            Quill.register(Font, true);

            var fullEditor = new Quill('#full-container .editor', {
                bounds: '#full-container .editor',
                modules: {
                    formula: true,
                    syntax: true,
                    toolbar: [
                        [
                            {
                                font: []
                            },
                            {
                                size: []
                            }
                        ],
                        ['bold', 'italic', 'underline', 'strike'],
                        [
                            {
                                color: []
                            },
                            {
                                background: []
                            }
                        ],
                        [
                            {
                                script: 'super'
                            },
                            {
                                script: 'sub'
                            }
                        ],
                        [
                            {
                                header: '1'
                            },
                            {
                                header: '2'
                            },
                            'blockquote',
                            'code-block'
                        ],
                        [
                            {
                                list: 'ordered'
                            },
                            {
                                list: 'bullet'
                            },
                            {
                                indent: '-1'
                            },
                            {
                                indent: '+1'
                            }
                        ],
                        [
                            'direction',
                            {
                                align: []
                            }
                        ],
                        ['link', 'image', 'video', 'formula'],
                        ['clean']
                    ]
                },
                theme: 'snow'
            });

            fullEditor.on('text-change', function (delta, oldDelta, source) {
                $('#full-container #bodyHtml').val(fullEditor.container.firstChild.innerHTML);
            });

            var editors = [fullEditor];
        })(window, document, jQuery);

    </script>
@endsection
