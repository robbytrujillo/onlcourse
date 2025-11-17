<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="w-full py-3 text-white bg-red-500 rounded-3xl">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                
                <form method="POST" action="{{ route('admin.courses.update', $course) }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name" value="{{ $course->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <img src="{{ Storage::url($course->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]}">
                        <x-text-input id="thumbnail" class="block w-full mt-1" type="file" name="thumbnail" autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="path_trailer" :value="__('Path_trailer')" />
                        <x-text-input id="path_trailer" class="block w-full mt-1" type="text" name="path_trailer" value="{{ $course->path_trailer }}" required autofocus autocomplete="path_trailer" />
                        <x-input-error :messages="$errors->get('path_trailer')" class="mt-2" />
                    </div>
                    
{{--  
                    <div class="mt-4">
                        <x-input-label for="teacher" :value="__('teacher')" />
                        <x-text-input id="teacher" class="block w-full mt-1" type="text" name="teacher_id" :value="old('teacher')" required autofocus autocomplete="teacher" />
                        <x-input-error :messages="$errors->get('teacher')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="teacher" :value="__('teacher')" />
                        
                        <select name="teacher_id" id="teacher_id" class="w-full py-3 pl-3 border rounded-lg border-slate-300">
                            <option value="">Choose item</option>
                            @forelse($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @empty
                            @endforelse
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>  --}}

                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Category')" />
                        
                        <select name="category_id" id="category_id" class="w-full py-3 pl-3 border rounded-lg border-slate-300">
                            <option value="">Choose category</option>
                            @forelse($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty
                            @endforelse
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea name="about" id="about" cols="30" rows="5" class="w-full border border-slate-300 rounded-xl">{{ $course->about}}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <hr class="my-5">

                    <div class="mt-4">
                        
                        <div class="flex flex-col gap-y-5">
                            <x-input-label for="keypoints" :value="__('Keypoints')" />
                            @forelse($course->course_keypoints as $keypoint)
                                <input type="text" class="py-3 border rounded-lg border-slate-300" value="{{ $keypoint->name }}" name="course_keypoints[]">
                            @empty
                                <p>
                                    Data Keypoint
                                </p>
                            @endforelse
                        </div>
                        <x-input-error :messages="$errors->get('keypoints')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Update Course
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
