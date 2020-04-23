<div class="sidebar" id="accordion">
                        
                        <ul class="sidebar-menu list-group list-unstyled">
                             @if( $user->is_user())
                            <li class="{{request()->is('dashboard') || request()->is('dashboard/u/applied-jobs*') || request()->is('dashboard/u/saved-jobs*')? 'active' : ''}}">
                                <a href="{{route('dashboard')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-home"></i> </span>
                                    <span class="title">@lang('app.my_jobs')</span>
                                </a>
                           
                            <ul class="dropdown-menu" style="display: none;">
                            <li class="{{request()->is('dashboard') ? 'active' : ''}}">
                                <a href="{{route('dashboard')}}" class="list-group-item-action {{request()->is('dashboard')? 'active' : ''}}">
                                    <!-- <span class="sidebar-icon"><i class="la la-list-alt"></i> </span> -->
                                    <span class="title">@lang('app.recommended_jobs')</span>
                                </a>
                            </li>    
                            <li class="{{request()->is('dashboard/u/applied-jobs*')? 'active' : ''}}">
                                <a href="{{route('applied_jobs')}}" class="list-group-item-action {{request()->is('dashboard/u/applied-jobs*')? 'active' : ''}}">
                                    <!-- <span class="sidebar-icon"><i class="la la-list-alt"></i> </span> -->
                                    <span class="title">@lang('app.applied_jobs')</span>
                                </a>
                            </li>
                            <li class="{{request()->is('dashboard/u/saved-jobs*')? 'active' : ''}}">
                                <a href="{{route('saved_jobs')}}" class="list-group-item-action {{request()->is('dashboard/u/saved-jobs*')? 'active' : ''}}">
                                    <!-- <span class="sidebar-icon"><i class="la la-list-alt"></i> </span> -->
                                    <span class="title">@lang('app.saved_jobs')</span>
                                </a>
                            </li>
                        </ul>
                             </li>
                             @endif
                            @if($user->is_admin())
                            <li class="{{request()->is('dashboard/categories*') || request()->is('dashboard/universities*') || request()->is('dashboard/institutions*') || request()->is('dashboard/branches*') ? 'active' : ''}}">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-black-tie"></i> </span>
                                    <span class="title">@lang('app.master')</span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>
                            <ul class="dropdown-menu" style="display: none;">
                            <li class="{{request()->is('dashboard/categories*')? 'active' : ''}}">
                                <a href="{{route('dashboard_categories')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-th-large"></i> </span>
                                    <span class="title">@lang('app.categories')</span>
                                </a>
                            </li>

                            <li class="{{request()->is('dashboard/universities*')? 'active' : ''}}">
                                <a href="{{route('dashboard_universities')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-building"></i> </span>
                                    <span class="title">@lang('app.universities')</span>
                                </a>
                            </li>
                             <li class="{{request()->is('dashboard/institutions*')? 'active' : ''}}">
                                <a href="{{route('dashboard_institutions')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-building"></i> </span>
                                    <span class="title">@lang('app.institutions')</span>
                                </a>
                            </li>

                            <li class="{{request()->is('dashboard/branches*')? 'active' : ''}}">
                                <a href="{{route('dashboard_branches')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-building"></i> </span>
                                    <span class="title">@lang('app.branches')</span>
                                </a>
                            </li>
                            </ul>
                            </li>
                            @endif

                            @if( ! $user->is_user())


                            <li class="{{request()->is('dashboard/employer*')? 'active' : ''}}">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-black-tie"></i> </span>
                                    <span class="title">@lang('app.employer')</span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link" href="{{route('post_new_job')}}">@lang('app.post_new_job')</a></li>
                                    <li><a class="sidebar-link" href="{{route('posted_jobs')}}">@lang('app.posted_jobs')</a></li>
                                    <li><a class="sidebar-link" href="{{route('employer_applicant')}}">@lang('app.applicants')</a></li>
                                    <li><a class="sidebar-link" href="{{route('shortlisted_applicant')}}">@lang('app.shortlist')</a></li>
                                    <li><a class="sidebar-link" href="{{route('employer_profile')}}">@lang('app.profile')</a></li>
                                </ul>
                            </li>

                            @endif

                            @if($user->is_admin())


                            <li class="{{request()->is('dashboard/jobs*')? 'active' : ''}}">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-briefcase"></i> </span>
                                    <span class="title">@lang('app.jobs')</span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link" href="{{route('pending_jobs')}}">@lang('app.pending') <span class="badge badge-success float-right">{{$pendingJobCount}}</span></a> </li>
                                    <li><a class="sidebar-link" href="{{route('approved_jobs')}}">@lang('app.approved')  <span class="badge badge-success float-right">{{$approvedJobCount}}</span> </a></li>
                                    <li><a class="sidebar-link" href="{{route('blocked_jobs')}}">@lang('app.blocked')  <span class="badge badge-success float-right">{{$blockedJobCount}}</span> </a></li>
                                </ul>
                            </li>

                            <li class="{{request()->is('dashboard/flagged*')? 'active' : ''}}">
                                <a href="{{route('flagged_jobs')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-flag-o"></i> </span>
                                    <span class="title">@lang('app.flagged_jobs')</span>
                                </a>
                            </li>


                            <li class="{{request()->is('dashboard/cms*')? 'active' : ''}}">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-file-text-o"></i> </span>
                                    <span class="title">@lang('app.cms')</span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link" href="{{route('pages')}}">@lang('app.pages')</a></li>
                                    <li><a class="sidebar-link" href="{{route('posts')}}">@lang('app.posts')</a></li>
                                </ul>
                            </li>


                            <li class="{{request()->is('dashboard/settings*')? 'active' : ''}}">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-cogs"></i> </span>
                                    <span class="title">@lang('app.settings')</span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link" href="{{route('general_settings')}}">@lang('app.general_settings')</a></li>
                                    <li><a class="sidebar-link" href="{{route('pricing_settings')}}">@lang('app.pricing')</a></li>
                                    <li><a class="sidebar-link" href="{{route('gateways_settings')}}">@lang('app.gateways')</a></li>
                                </ul>
                            </li>

                            @endif

                            <li class="{{request()->is('dashboard/payments*')? 'active' : ''}}">
                                <a href="{{route('payments')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-money"></i> </span>
                                    <span class="title">@lang('app.payments')</span>
                                </a>
                            </li>

                            @if($user->is_admin())

                            {{--
                            <li>
                                <a href="{{route('dashboard')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-user-secret"></i> </span>
                                    <span class="title">@lang('app.administrator')</span>
                                </a>
                            </li>
                            --}}
                            <li class="{{request()->is('dashboard/u/users*')? 'active' : ''}}">
                                <a href="{{route('users')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-users"></i> </span>
                                    <span class="title">@lang('app.users')</span>
                                </a>
                            </li>

                            @endif

                            @if (Auth::user()->user_type == 'user')
                            <li class="{{request()->is('dashboard/u/education/edit') || request()->is('dashboard/u/profile/edit') || request()->is('dashboard/u/career/edit') ? 'active' : ''}}">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-black-tie"></i> </span>
                                    <span class="title">@lang('app.edit_profile')</span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>
                            <ul class="dropdown-menu" style="display: none;">    
                            <li class="{{request()->is('dashboard/u/education/*')? 'active' : ''}}">
                                <a href="{{route('education_edit')}}" class="list-group-item-action ">
                                    <!-- <span class="sidebar-icon"><i class="la la-user"></i> </span> -->
                                    <span class="title">@lang('app.education_details')</span>
                                </a>
                            </li>
                            <li class="{{request()->is('dashboard/u/profile/edit')? 'active' : ''}}">
                                <a href="{{route('profile_edit')}}" class="list-group-item-action {{request()->is('dashboard/u/profile/edit')? 'active' : ''}}">
                                    <!-- <span class="sidebar-icon"><i class="la la-user"></i> </span> -->
                                    <span class="title">@lang('app.personal_details')</span>
                                </a>
                            </li>
                            <li class="{{request()->is('dashboard/u/career/edit')? 'active' : ''}}">
                                <a href="{{route('career_edit')}}" class="list-group-item-action {{request()->is('dashboard/u/career/edit')? 'active' : ''}}">
                                    <!-- <span class="sidebar-icon"><i class="la la-user"></i> </span> -->
                                    <span class="title">@lang('app.career_details')</span>
                                </a>
                            </li>
                            <li class="{{request()->is('dashboard/u/preference/edit')? 'active' : ''}}">
                                <a href="{{route('preference_edit')}}" class="list-group-item-action {{request()->is('dashboard/u/preference/edit')? 'active' : ''}}">
                                    <!-- <span class="sidebar-icon"><i class="la la-user"></i> </span> -->
                                    <span class="title">@lang('Edit Preference')</span>
                                </a>
                            </li>
                            <li class="{{request()->is('dashboard/u/profile/upload_resume')? 'active' : ''}}">
                                <a href="{{route('upload_resume')}}" class="list-group-item-action {{request()->is('dashboard/u/profile/upload_resume')? 'active' : ''}}">
                                    <!-- <span class="sidebar-icon"><i class="la la-user"></i> </span> -->
                                    <span class="title">@lang('app.resume')</span>
                                </a>
                            </li>
                           
                        </ul>
                    </li>
                    @endif

                            <li class="{{request()->is('dashboard/account*')? 'active' : ''}}">
                                <a href="{{route('change_password')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-lock"></i> </span>
                                    <span class="title">@lang('app.change_password')</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}" class="list-group-item-action active"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="sidebar-icon"><i class="la la-sign-out"></i> </span>
                                    <span class="title">@lang('app.logout')</span>
                                </a>
                            </li>


                        </ul>
                    </div>