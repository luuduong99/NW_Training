<li>
    <a href="{{ route('home') }}" class="side-nav-link">
        <i class="mdi mdi-account-details-outline mdi-24px"></i>
        <span> {{ __('Home') }} </span>
    </a>

</li>
<li>
    <a href="{{ route('students.index') }}" class="side-nav-link">
        <i class="mdi mdi-account-details-outline mdi-24px"></i>
        <span> {{ __('Students') }} </span>
    </a>

</li>
<li>
    <a href="{{ route('faculties.index') }}" class="side-nav-link">
        <i class="mdi mdi-clipboard-file-outline mdi-24px"></i>
        <span> {{ __('Faculties') }} </span>
    </a>
</li>
<li>
    <a href="{{ route('subjects.index') }}" class="side-nav-link">
        <i class="mdi mdi-battery-high mdi-24px"></i>
        <span> {{ __('Subjects') }} </span>
    </a>
</li>

