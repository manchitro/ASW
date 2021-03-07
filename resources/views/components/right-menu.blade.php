<button class="btn seabluebg floating-menu floating-menu-{{ $rightmenustate }} shadow" id="floating-menu" type="button" onclick="togglerightmenustate()">
    <i class="fas {{ $rightmenustate == 'shown' ? 'fa-arrow-right' : 'fa-bars' }}" id="right-menu-button"></i>
</button>
<div id="right-menu" class="right-menu right-menu-{{ $rightmenustate }} shadow">
    <nav id="sidebar-menu" class="seabluebg round-border-right-menu py-2 pl-2">
        <ul class="list-unstyled components m-0">
            {{-- <li>
                <h5>{{$sectionname}}</h5>
            </li> --}}
            <li>
                <a href="/faculty/section/{{ $sectioneid }}/students">
                    <i class="fas fa-users"></i>
                    View Students
                </a>
            </li>
            <li>
                <a href="/faculty/section/{{ $sectioneid }}/students/add">
                    <i class="fas fa-user-plus"></i>
                    Add Students
                </a>
            </li>
            <li>
                <a href="/faculty/section/{{ $sectioneid }}/students/remove">
                    <i class="fas fa-user-minus"></i>
                    Remove Students
                </a>
            </li>
            <li>
                <a href="/faculty/section/{{ $sectioneid }}/edit">
                    <i class="fas fa-edit"></i>
                    Edit Section
                </a>
            </li>
            <li>
                <a href="/faculty/section/{{ $sectioneid }}/lectures/add">
                    <i class="fas fa-calendar-plus"></i>
                    Add Lecture
                </a>
            </li>
            <li>
                <a href="/faculty/section/{{ $sectioneid }}/lectures">
                    <i class="fas fa-calendar-alt"></i>
                    View Lectures
                </a>
            </li>
        </ul>
    </nav>
</div>
<script>
    window.addEventListener('load', function() {
        $("#floating-menu").click(function() {
            if ($("#floating-menu").hasClass("floating-menu-collapsed")) {
                $("#floating-menu").removeClass("floating-menu-collapsed")
                $("#floating-menu").addClass("floating-menu-shown")
                $("#right-menu-button").removeClass("fa-bars")
                $("#right-menu-button").addClass("fa-arrow-right")
            } else {
                $("#floating-menu").removeClass("floating-menu-shown")
                $("#floating-menu").addClass("floating-menu-collapsed")
                $("#right-menu-button").addClass("fa-bars")
                $("#right-menu-button").removeClass("fa-arrow-right")
            }
            if ($("#right-menu").hasClass("right-menu-collapsed")) {
                $("#right-menu").removeClass("right-menu-collapsed")
                $("#right-menu").addClass("right-menu-shown")
            } else {
                $("#right-menu").removeClass("right-menu-shown")
                $("#right-menu").addClass("right-menu-collapsed")
            }

        })
    })

    function togglerightmenustate() {
        $.get("/faculty/async/togglerightmenustate", function(data) {
            // alert(data)
        });
    }

</script>
