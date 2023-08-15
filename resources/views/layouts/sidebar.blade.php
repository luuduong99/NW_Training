<li>
    <a href="{{ route('edu.home') }}" class="side-nav-link">
        <i class="mdi mdi-account-details-outline mdi-24px"></i>
        <span> {{ __('Home') }} </span>
    </a>

</li>
<li>
    <a href="{{ route('edu.students.index') }}" class="side-nav-link">
        <i class="mdi mdi-account-details-outline mdi-24px"></i>
        <span> {{ __('Students') }} </span>
    </a>

</li>
<li>
    <a href="{{ route('edu.faculties.index') }}" class="side-nav-link">
        <i class="mdi mdi-clipboard-file-outline mdi-24px"></i>
        <span> {{ __('Faculties') }} </span>
    </a>
</li>
<li>
    <a href="{{ route('edu.subjects.index') }}" class="side-nav-link">
        <i class="mdi mdi-battery-high mdi-24px"></i>
        <span> {{ __('Subjects') }} </span>
    </a>
</li>
<li>
    <a href="{{ route('edu.students.list-point')  }}" class="side-nav-link">
        <i class="mdi mdi-battery-high mdi-24px"></i>
        <span> {{ __('Points') }} </span>
    </a>
</li>
