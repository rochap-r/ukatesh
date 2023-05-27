<div>
    {{-- Stop trying to control. --}}

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="avatar avatar-md"
                      style="background-image: url({{ $user->image ? asset('storage/'.$user->image->path) : asset('placeholders/picture.jpg')}})"></span>
            </div>
            <div class="col">
                <h2 class="page-title">{{ $user->name }} {{ $user->sname }}</h2>
                <div class="page-subtitle">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Download SVG icon from http://tabler-icons.io/i/building-skyscraper -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21l18 0" />
                                <path d="M5 21v-14l8 -4v18" />
                                <path d="M19 21v-10l-6 -4" />
                                <path d="M9 9l0 .01" />
                                <path d="M9 12l0 .01" />
                                <path d="M9 15l0 .01" />
                                <path d="M9 18l0 .01" />
                            </svg>
                            <a href="#" class="text-reset">{{ \Illuminate\Support\Str::ucfirst($user->role->name ?? 'Admin') }}</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-auto d-md-flex">
                <input type="file" name="picture" id="changeProfile" class="d-none"
                       onchange="this.dispatchEvent(new InputEvent('input'))">

                <a href="#" class="btn btn-primary"
                   onclick="event.preventDefault();document.getElementById('changeProfile').click();">
                    <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 8l.01 0"></path>
                        <path d="M4 4m0 3a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3z">
                        </path>
                        <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5"></path>
                        <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2"></path>
                    </svg>Changez votre photo
                </a>
            </div>
        </div>
    </div>

</div>
