<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">

            <img src="{{ asset('storage/profile/'.Auth::user()->image)  }}" width="48" height="48" alt="User" />
        </div>

        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
            <div class="email">{{Auth::user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">

                    <li role="separator" class="divider"></li>

                    <li role="separator" class="divider"></li>

                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                           Logout <i class="material-icons">exit_to_app</i>

                        </a>
                        <form id="logout-form" method="POST" action="{{route('logout')}} " style="display: none">
                            {{ csrf_field() }}

                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header"> QUESTION BANK MANAGEMENT SYSTEM</li>

            {{-- Admin section --}}

            @if(Request::is('admin*'))

                <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>DASHBOOARD</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/manageQuestion*') ? 'active' : ''}}">
                    <a href="{{route('admin.manageQuestion.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Add Question </span>
                    </a>
                </li>

                <li class="{{Request::is('admin/manageQuestionBank*') ? 'active' : ''}}">
                    <a href="{{route('admin.manageQuestionBank.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Questions Bank</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/manageQuestionBank/create*') ? 'active' : ''}}">
                    <a href="{{route('admin.manageQuestionBank.create')}}">
                        <i class="material-icons">dashboard</i>
                        <span>ALL Question here</span>
                    </a>
                </li>



                <li class="{{Request::is('admin/student*') ? 'active' : ''}}">
                    <a href="{{route('admin.subject.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span>MANAGE ALL SUBJECT</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/semester*') ? 'active' : ''}}">
                    <a href="{{route('admin.semester.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span>MANAGE ALL SEMESTER</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/term*') ? 'active' : ''}}">
                    <a href="{{route('admin.term.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span>MANAGE ALL TERM</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/mark*') ? 'active' : ''}}">
                    <a href="{{route('admin.mark.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span>MANAGE QUESTION MARK</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/section*') ? 'active' : ''}}">
                    <a href="{{route('admin.section.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span>MANAGE MANAGE QUESTION SET</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/time*') ? 'active' : ''}}">
                    <a href="{{route('admin.time.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span> MANAGE ALL TIME</span>
                    </a>
                </li>


                <li class="header">LABELS</li>
                <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/authors') ? 'active' : '' }}">
                    <a href="{{ route('admin.author.index') }}">
                        <i class="material-icons">account_circle</i>
                        <span>Authors</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/authors') ? 'active' : '' }}">
                    <a href="{{ route('admin.subAdmin.add') }}">
                        <i class="material-icons">account_circle</i>
                        <span>Add SubAmdim</span>
                    </a>
                </li>

            @endif



            {{-- Author section --}}

            @if(Request::is('author*'))

                <li class="{{Request::is('author/dashboard') ? 'active' : ''}}">
                    <a href="{{route('author.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>STUDENT PROTAL DASHBOOARD</span>
                    </a>
                </li>

                 <li class="{{Request::is('author/question*') ? 'active' : ''}}">
                    <a href="{{route('author.question.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span>ALL Question here</span>
                    </a>
                </li>

                <li class="header">LABELS</li>
                <li class="{{Request::is('author/post*') ? 'active' : ''}}">
                    <a href="{{route('author.post.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span>ALL QUESTION</span>
                    </a>
                </li> --}}


                {{-- <li class="{{ Request::is('author/feedBacks') ? 'active' : '' }}">
                    <a href="{{ route('author.feedBack.index') }}">
                        <i class="material-icons">comment</i>
                        <span>FEEDBACK</span>
                    </a>
                </li> --}}

                <li class="{{ Request::is('author/settings') ? 'active' : '' }}">
                    <a href="{{ route('author.settings') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>


            @endif
{{--
            @if(Request::is('subadmin*'))

                <li class="{{Request::is('subadmin/home') ? 'active' : ''}}">
                    <a href="{{route('subadmin.home')}}">
                        <i class="material-icons">dashboard</i>
                        <span>DASHBOOARD</span>
                    </a>
                </li>

                <li class="{{Request::is('subadmin/post*') ? 'active' : ''}}">
                    <a href="{{route('post.index')}}">
                        <i class="material-icons">dashboard</i>
                        <span>ALL QUESTION</span>
                    </a>
                </li>



                @endif --}}


        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2018<a href="javascript:void(0);">Design By-Shuvosarker.com</a>.
        </div>

    </div>
    <!-- #Footer -->
</aside>
