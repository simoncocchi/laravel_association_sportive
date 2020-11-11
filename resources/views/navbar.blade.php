<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        background-color: #111;
    }

    .active {
        background-color: #4CAF50;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
        color: gray;
    }
</style>

<ul>
    <li><a href="{{route('accueil')}}">Accueil</a></li>
    <li><a href="#news" class="disabled">Contact</a></li>
    <li style="float:right"><a class="disabled" href="#about">Log in</a></li>
    <li style="float:right"><a href="{{route('register')}}">Register</a></li>

</ul>

