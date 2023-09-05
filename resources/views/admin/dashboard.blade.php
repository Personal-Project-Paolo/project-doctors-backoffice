<x-app-layout>
        @section('contents')
          <div class="my-container">
            <div class="title">
                <h1>Ti diamo il benvenuto!</h1>
            </div>
        </div>
        @endsection
</x-app-layout>


<style>
    .my-container{
        background-image: url('https://us.123rf.com/450wm/wstockstudio/wstockstudio1707/wstockstudio170700042/81669810-stetoscopio-isolato-su-sfondo-nero-scrivania-di-medici-sterili-accessori-medici-sullo-sfondo-nero.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        position: relative;
    }
    .title{
        /* margin-top: 6rem; */
        margin-left: 4rem;
    }
    h1{
        color: white;
        font-size: 5rem
    }
</style>