@extends('layouts.app')

@section('content')


<div class="bg-slate-200 py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <h2 class="text-4xl leading-10 tracking-tight font-bold text-zinc-700">Investing Note Forum</h2>
        <p class="max-w-2xl mx-auto mt-5 text-xl leading-7 text-gray-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat cupiditate optio inventore a, natus nesciunt ipsam numquam odio libero exercitationem. Alias nemo quod expedita voluptas? Itaque reiciendis qui voluptatum expedita!</p>
    </div>

    {{-- Posts Wrapper --}}
    <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
        @foreach ($posts as $post)
         {{-- Post --}}

         <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
            {{-- Header/Title --}}
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=869&q=80" alt="forum image">
            </div>

            {{-- Content --}}
            <div class="flex-1 p-6 flex-col justify-between">
                <div class="flex-1">
                    <a href="posts/{{ $post->id }}">
                        <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900"> {{ $post->title }} </h3>
                    </a>
                    <p class="mt-3 text-base leading-6 text-gray-500">
                        @if (strlen($post->body) > 200)
                            {{ substr($post->body, 0, 200) }}...
                            @else
                                {{ $post->body }}
                        @endif
                    </p>    
                </div>
                
                <div class="mt-6 flex items-center">
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
                </div>
            </div>
        </div>
        @endforeach
        {{ ($posts->links(('pagination::bootstrap-4'))) }}
    </div>
    <a href="/posts/create">
        <button type="submit" class="mt-6 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">Share New</button>
    </a>
</div>
@endsection