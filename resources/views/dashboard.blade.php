

<x-app-layout>
    <x-slot name="header">
        @if (!Auth::user()->user_profile && !Auth::user()->company_profile)
        <a href="/reclamante/create">Complete seu perfil</a>
        @endif
    </x-slot>

    <div class="min-w-0 flex-auto px-4 sm:px-6 xl:px-8 pt-10 pb-24 lg:pb-16">
      <div class="rounded-t-xl overflow-hidden bg-gradient-to-r from-fuchsia-50 to-fuchsia-100 p-8">
          <div class="grid grid-cols-3 gap-4" id="complaint">      
          </div>
      </div>
 </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script>

$(function(){
    $.ajax({
      url:"{{ route('denuncia_all') }}",
      type: "get",
      data: $(this).serialize(),
      dataType: 'json',
      success: function(response){
        var json = response;

       for (i = 0; i < json.length; i++) {
          var div = document.getElementById("complaint");
          var divDenuncia = document.createElement("div");
          var a = document.createElement("a");

          divDenuncia.className = 'h-12 flex items-center bg-gray-200 rounded-md text-center pl-2';
          divDenuncia.id = i;
          a.id = i+'denuncia';
          a.innerHTML = json[i]["title"];


          div.appendChild(divDenuncia);
          divDenuncia.appendChild(a);
       }
      }
    });
}); 
</script>