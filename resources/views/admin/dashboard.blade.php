<x-app-layout>
    @section('contents')
        <div class=" my-container flex flex-col justify-center items-center ">
            {{-- <div class=" max-w-sm p-8 rounded-lg shadow card flex flex-col justify-around items-center ">
                <h1 class="text-4xl font-semibold leading-normal">Benvenuto/a in BDoctors Dottor/Dottoressa <span
                        class="text-6xl font-extrabold text-white-900 dark:text-white uppercase ">{{ Auth::user()->lastname }}</span>
                </h1>
                <div>
                    <p class="mb-3 max-w-lg text-3xl font-semibold ">
                        Nella tua <span class="uppercase text-4xl">dasboard</span> potrai:
                    </p>
                    <ul>
                        <li class="mb-5"><span class="uppercase uppercase text-2xl "> <i
                                    class="fa-solid fa-user-doctor my-icon"></i> Gestire </span>facilmente il tuo profilo
                        </li>
                        <li class="mb-5"><span class="uppercase uppercase text-2xl "> <i
                                    class="fa-solid fa-envelope-open-text   my-icon"></i> Comunicare </span>in maniera
                            sicura con i tuoi pazienti</li>
                        <li class=""><span class="uppercase uppercase text-2xl"> <i
                                    class="fa-solid fa-people-group   my-icon"></i> Scegliere </span>il tuo piano di
                            sponsorizzazionne</li>
                    </ul>
                </div>
            </div> --}}
            <section>
                <div class="title">
                    <span>Ciao, {{ Auth::user()->name }}!</span>
                    <span><a href="{{ route('admin.doctors.create') }}">Vai al
                            tuo profilo</a></span>
                </div>
            </section>
        </div>
    @endsection

</x-app-layout>


<style>
    .my-container {
        background: linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, #01BDD0 100%);
        height: 90vh;
    }


    a {
        color: inherit;
        text-decoration: inherit;
    }

    /* MAIN */

    ::selection {
        background-color: #f7ca18;
        color: #1b1b1b;
    }

    section {
        background-color: rgba(0, 0, 0, 0.2);
        height: 70vh;

        display: flex;

    }

    section .title {
        max-width: 60%;
        width: 100%;
        align-self: center;
        transform: translateY(-50px);
        margin: 0 auto;
    }

    section .title span {
        display: inline-block;
        font-size: 5vw;
        color: #efefef;
        width: 100%;
        text-transform: uppercase;
        transform: translateX(-100%);
        animation: byBottom 1s ease both;
        font-weight: 600;
        letter-spacing: 0.25vw;
    }

    section .title span:last-child {
        font-size: 1rem;
        animation: byBottom 1s 0.25s ease both;
    }

    section .title span a {
        font-size: 1.5rem;
        position: relative;
        display: inline-block;
        margin-left: 0.5rem;
        text-decoration: none;
        color: #f7ca18;
    }

    section .title span a::after {
        content: "";
        height: 2px;
        background-color: #f7ca18;
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 0;
        animation: linkAfter 0.5s 1s ease both;
    }

    @-moz-keyframes pop {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-webkit-keyframes pop {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-o-keyframes pop {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @keyframes pop {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-moz-keyframes byBottom {
        0% {
            transform: translateY(150%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-webkit-keyframes byBottom {
        0% {
            transform: translateY(150%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-o-keyframes byBottom {
        0% {
            transform: translateY(150%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @keyframes byBottom {
        0% {
            transform: translateY(150%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-moz-keyframes linkAfter {
        0% {
            width: 0;
        }

        100% {
            width: 30px;
        }
    }

    @-webkit-keyframes linkAfter {
        0% {
            width: 0;
        }

        100% {
            width: 30px;
        }
    }

    @-o-keyframes linkAfter {
        0% {
            width: 0;
        }

        100% {
            width: 30px;
        }
    }

    @keyframes linkAfter {
        0% {
            width: 0;
        }

        100% {
            width: 30px;
        }
    }
</style>
