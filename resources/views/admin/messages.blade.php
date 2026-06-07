@extends("admin.dashboard")
@section("title","Messages")
@section("Elements")
<!-- Messages -->
<div class="tab-content" id="messages">

    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-lg h-140">

        <h2 class="text-3xl font-black mb-10">
            Contact Messages
        </h2>

        <div class="space-y-6">

            @if(session()->has("success"))
            <!-- <div class="text-red">{{session()->get("success")}}</div> -->
            @endif
            @foreach($messages as $message)
            <div class="bg-black/30 border border-white/10 rounded-2xl p-6">

                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="font-bold text-xl">
                            {{$message->name}}
                        </h3>

                        <p class="text-purple-400 text-sm">
                            {{$message->email}}
                        </p>
                    </div>
                    <form action="{{url('delete-message/'.$message->id)}}" method="post">
                        @csrf
                        <button class="w-10 h-10 rounded-xl bg-red-500/20">
                            <i class="fa-solid fa-trash text-red-400"></i>
                        </button>
                    </form>
                </div>

                <p class="text-gray-400 leading-relaxed">
                    {{$message->message}}
                </p>

            </div>
            @endforeach

        </div>

    </div>

</div>
@endsection