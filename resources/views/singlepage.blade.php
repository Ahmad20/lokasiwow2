@extends('layouts.main')

<style>
    /* Style the list */
    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: #eee;
    }

    /* Display list items side by side */
    ul.breadcrumb li {
        display: inline;
        font-size: 18px;
    }

    /* Add a slash symbol (/) before/behind each list item */
    ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        content: "/\00a0";
    }

    /* Add a color to all links inside the list */
    ul.breadcrumb li a {
        color: #0275d8;
        text-decoration: none;
    }

    /* Add a color on mouse-over */
    ul.breadcrumb li a:hover {
        color: #01447e;
        text-decoration: underline;
    }

</style>

@section('container')
    <!-- KATEGORI TEMPAT -->
    <div class="container">
        <div class="d-flex align-items-center my-3" style="width: 100%;">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/posting/{{ $post->location }}">{{ $post->location }}</a></li>
                <li>{{ $post->title }}</li>
            </ul>
        </div>
    </div>

    <!-- TULISAN TEMPAT -->
    <section class="container">
        <div class="row gx-2">
            <div style="background-color: white;" class="rounded col-sm-12 col-md-8">
                <article class="m-3">

                    <h1 class="fw-bold fs-2 mb-0">{{ $post->title }}</h1>
                    <p style="color: gray;">{{ $post->location }}</p>
                    <div>
                        <img src="{{ $post->image_link }}" width="100%" alt="" />

                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eum corporis, illum cupiditate non,
                        tempore accusantium enim deleniti dignissimos ratione quaerat. Nostrum reprehenderit error
                        aspernatur esse
                        aperiam commodi cupiditate deleniti. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Quibusdam
                        dolores ipsa laborum vel, debitis odio, voluptas repellendus optio perferendis, rem aspernatur
                        sapiente
                        earum in? Quis soluta vitae omnis quam tempora.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem officiis eos atque illo numquam facere
                        dolorem
                        quam quae dignissimos modi ratione, vel dolore repellendus nulla blanditiis sequi, neque sunt quasi!
                    </p>

            </div>
            </article>

            <!-- BAGIAN KOMEN SAMA LIKE -->
            <div style="background-color: white;" class="rounded col-sm-12 col-md-4">


                {{-- Post Comments --}}
                <div class="card mt-5">
                    {{-- @php
                        $post_id = $post->post_id;
                        $comments = DB::table('comments')
                            ->where('post_id', '=', $post_id)
                            ->orderByDesc('created_at')
                            ->get();
                    @endphp --}}
                    <h5 class="card-header">Comments <span class="comment-count float-right badge badge-info" style="color:black">{{ count($comments) }}</span>
                    </h5>
                    <div class="card-body">
                        {{-- Add Comment --}}
                        <div class="add-comment mb-3">
                            @csrf
                            <textarea class="form-control comment" placeholder="Enter Comment"></textarea>
                            <button data-post="{{ $post->post_id }}"
                                class="btn btn-dark btn-sm mt-2 save-comment">Save</button>
                        </div>
                        <hr />
                        {{-- List Start --}}
                        {{-- <div class="comments">
                            <blockquote class="blockquote">
                                @php
                                    $comments = DB::table('comments')
                                        ->orderByDesc('created_at')
                                        ->get();
                                    foreach ($comments as $comment) {
                                        echo "<p class='mb-0'>$comment->comment_text</p>";
                                    }
                                @endphp

                            </blockquote>
                            <hr />
                            <p class="no-comments">No Comments Yet</p>
                        </div> --}}
                        <div class="comments" style="max-height: 300px; overflow-y: auto; ">

                            @if (count($comments) > 0)
                                @foreach ($comments as $comment)
                                    <blockquote class="blockquote">
                                        <small class="mb-0">
                                            {{ DB::table('users')->select('username')
                                            ->where('id', '=',  $comment->user_id)
                                            ->value('username') . " : " .
                                            $comment->comment_text }}
                                        </small>
                                    </blockquote>
                                    <hr />
                                @endforeach
                            @else
                                <p class="no-comments">No Comments Yet</p>
                            @endif
                        </div>
                    </div>

                </div>
                {{-- ## End Post Comments --}}

            </div>
        </div>
    </section>
@endsection


@section('greeting')
    <a href="/profile" style='text-decoration:none; color:white'>
        <p class="mb-0 me-2">
            @auth
                Hello, {{ auth()->user()->username }}
            @endauth
            {{-- @if (session()->has('username'))
                Hello, {{ session('username') }}
            @endif --}}
        </p>
    </a>
@endsection
@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        // Save Comment
        $(".save-comment").on('click', function() {
            var _comment = $(".comment").val();
            var _user = {{auth()->user()->id}};
            var _name = '{{auth()->user()->username}}';
            var _post = $(this).data('post');
            var vm = $(this);
            // Run Ajax
            $.ajax({
                url: "{{ url('save-comment') }}",
                type: "post",
                dataType: 'json',
                data: {
                    user: _user,
                    comment: _comment,
                    post: _post,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    vm.text('Saving...').addClass('disabled');
                },
                success: function(res) {
                    var _html = '<blockquote class="blockquote animate__animated animate__bounce">\
                                    <small class="mb-0">' +_name + ' : ' + _comment + '</small>\
                                    </blockquote><hr/>';
                    if (res.bool == true) {
                        $(".comments").prepend(_html);
                        $(".comment").val('');
                        $(".comment-count").text($('blockquote').length);
                        $(".no-comments").hide();
                    }
                    vm.text('Save').removeClass('disabled');
                }
            });
        });

    </script>
@endsection
