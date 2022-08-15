@extends('layouts.app')
@section('content')

{{-- <div class="bg-gray-50 py-16 px-4 sm:grid sm:grid-cols-12">
    <div class="sm:col-start-4 sm:col-span-6">
        <a href="/">
        <div class="bg-white text-center px-4 py-3 rounded-sm shadow-sm hover:shadow-md">Back</div>
        </a>

        <div class="bg-white mt-4 px-4 py-6 rounded-sm shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png" alt="author avatar">
                </div>

                <div class="ml-3">
                    <p class="text-sm leading-5 font-medium text-gray-900">Marc Z</p>
                    <div class="flex text-sm leading-5 text-gray-500">
                        <time datetime="{{ $post->created_at }}">
                            {{ $post->created_at->diffForHumans() }}
                        </time>
                        <span class="mx-1">&middot;</span>
                        <h2>{{  ceil(strlen($post->body) /863) }} min read</h2>
                        <h3 style="padding-left: 20px">{{ $post->tag }}</h3>
                    </div>
                </div>
        </div> --}}

        <div class="bg-gray-50 py-16 px-4 sm:grid sm:grid-cols-12">
            <div class="sm:col-start-4 sm:col-span-6">
                <a href="/">
                    <div class="bg-white text-center px-4 py-3 rounded-sm shadow-sm hover:shadow-md">Back</div>
                </a>
        
                <div class="bg-white mt-4 px-4 py-6 rounded-sm shadow-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png" alt="author avatar">
                        </div>
        
                        <div class="ml-3">
                            <p class="text-sm leading-5 font-medium text-gray-900">John Doe</p>
                            <div class="flex text-sm leading-5 text-gray-500">
                                <time datetime="{{ $post->created_at }}">
                                    {{ $post->created_at->diffForHumans() }}
                                </time>
                                <span class="mx-1">&middot;</span>
                                <span>{{ ceil(strlen($post->body) / 863) }} min read</span>
                                <h3 style="padding-left: 20px">{{ $post->tag }}</h3>
                            </div>
                        </div>
                    </div>
        
                    <div class="mt-4 rounded-sm overflow-hidden">
                        <img class="w-full object-cover" src="https://images.unsplash.com/photo-1602526430780-782d6b1783fa?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="blog image">
                    </div>
        
                    <h2 class="mt-6 text-4xl leading-10 tracking-tight font-bold text-gray-900 text-center">{{ $post->title }}</h2>
                    <p class="mt-6 leading-6 text-gray-500">{{ $post->body }}</p>
                </div>

                <div>
                    <form action="/posts/{{ $post->id }}/comments" method="POST" class="mb-0">
                        @csrf
                        <label for="author" class="mt-6 block text-sm font-medium text-gray-700">Author</label>
                        <input type="text" name="author" class="mt-1 py-2 px-3 block w-full borded border-gray-400 rounded-md shadow-sm" value="{{ old('author') }}" required>

                        <label for="comment" class="mt-6 block text-sm font-medium text-gray-700">Comment</label>
                        <textarea name="text" class="mt-1 py-2 px-3 block w-full borded border-gray-400 rounded-md shadow-sm" value="{{ old('text') }}"required></textarea>

                        @if($errors->any())
                            <div class="mt-6">
                                <ul class="bg-red-100 px-4 py-5 rounded-md">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button type="submit" class="mt-6 py-2 px-4 w-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">Comment</button>
                    </form>  
                </div>

                <div class="mt-6">
                    @foreach ($comments as $comment)
                        <div class="mb-5 bg-white px-4 py-6 rounded-sm shadow-md">
                            <div class="flex">
                                {{-- Avatar --}}
                                <div class="mr-3 flex flex-col justify-center">
                                    <div>
                                        <?php
                                            $parts = explode(' ', $comment->author);
                                            $sign = ($parts[0] [0] . $parts[count($parts) - 1][0]);
                                        ?>
                                        <span class="bg-gray-300 p-3 rounded-full">{{ $sign }}</span>
                                    </div>
                                </div>
                                {{-- Avatar --}}

                                <div class="flex flex-col justify-center">
                                    <p class="mr-2 font-bold">{{ $comment->author }}</p>
                                    <p class="text-grauy-600">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                        </div>
                        <div class="mt-3">
                            <p>{{ $comment->text }}</p>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>

@endsection