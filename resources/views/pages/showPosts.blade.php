@extends ('layouts.app')

@section('title', 'MajaBlog')

@section('content')
    <div>
        <div class="container mx-auto">
            <x-navbar />
            <div class="my-3">
                <div>
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-full md:h-96 object-cover">
                </div>
                <div class="my-4 mx-auto text-center">
                    <h1 class="font-semibold text-3xl">
                        {{ $post->title }}
                    </h1>
                </div>
                <div class="max-w-sm md:max-w-4xl mx-auto text-justify font-light text-sm md:text-base">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non quibusdam quam minima velit
                        exercitationem, debitis odio, necessitatibus eveniet amet eius harum dolorum molestias minus
                        accusamus, error tempora voluptatibus hic saepe eaque illo. Eaque tenetur dolorum nisi quisquam
                        voluptatum modi doloremque labore magni minima placeat quas recusandae eligendi quod earum soluta
                        vero accusamus quaerat temporibus suscipit repudiandae voluptates hic voluptatem, nostrum incidunt.
                        Nostrum illum libero eius, tempora deserunt ea recusandae rem animi adipisci dolorum, doloremque
                        quasi a repellendus corrupti, facilis vitae ex. Molestiae, consequatur, dolores accusamus fugit
                        repellat eum nulla quibusdam delectus eos rerum maxime sit reiciendis totam nobis in perferendis
                        harum. Necessitatibus itaque ab ducimus debitis eius voluptates ratione facilis eos consequatur modi
                        accusamus distinctio sit iste nihil alias, cum est facere aut quibusdam quod laudantium reiciendis
                        corrupti! Minus explicabo tempore id iusto aspernatur, vero culpa nemo, quis dolores doloremque
                        ducimus velit dolorem. Labore ex harum animi! Atque facere fuga voluptate corporis consectetur
                        beatae accusamus fugit cupiditate possimus fugiat voluptates recusandae totam placeat sunt,
                        voluptatibus praesentium distinctio nesciunt eos delectus laborum hic! Voluptates, pariatur facere.
                        Dolor delectus magni cumque officia molestias esse quis expedita reprehenderit possimus itaque quae,
                        beatae consequatur, aspernatur accusamus? Assumenda ipsa at laboriosam veniam a recusandae nisi
                        labore voluptatum numquam illum ducimus eos nobis illo nam, nihil fugit praesentium? Nostrum itaque
                        fuga eveniet, officia esse tempora, ea ut libero excepturi quisquam suscipit aperiam iste pariatur
                        vitae nulla facere expedita nisi distinctio eius accusamus at? Quam neque libero hic voluptas
                        dignissimos omnis nihil cumque unde voluptate, consequatur iure.</p>
                </div>
                <div class="my-4 max-w-md md:max-w-4xl text-right mx-auto ">
                    <div class="text-gray-600 text-xs">
                        <p> Created By : {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
