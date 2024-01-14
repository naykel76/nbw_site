{{-- --------------- BEFORE YOU DO ANYTHING CRAZY -------------
DO NOT remove the container from this layout. If you don't want
the container then publish the layout locally and override. --}}

Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus exercitationem itaque aliquam dolor impedit natus animi incidunt porro obcaecati fuga suscipit dicta nulla inventore dolore culpa eos sint doloremque, ipsa officiis repellat dignissimos maxime! Officia deleniti architecto, alias quia magnam iure, at quis dolorem explicabo, ducimus ullam expedita adipisci assumenda perferendis. Nihil cumque commodi quod neque, reprehenderit repellat! Id nulla aliquid repellendus odio perspiciatis. Esse, a perspiciatis hic doloremque similique ipsam laboriosam eius magni quo omnis totam tenetur. Obcaecati dignissimos temporibus repellendus necessitatibus hic tenetur consequatur voluptatum sapiente ad molestiae nam quasi quam quae quos possimus, maxime nemo sint in? Enim dolor hic amet qui accusamus quibusdam ad inventore ipsum fugit. Quos est dolor magnam numquam ut molestiae, commodi saepe, repellat veritatis, earum nesciunt eveniet labore repudiandae asperiores quaerat suscipit praesentium quae nisi! Facilis, aspernatur unde consequuntur voluptate pariatur doloremque, repudiandae illum perspiciatis ab reprehenderit reiciendis impedit sequi? Soluta placeat excepturi, aliquid iure dicta incidunt, dolorem sequi id alias modi unde, in possimus et! Obcaecati dignissimos dicta, libero mollitia consectetur eligendi laborum nam adipisci. Possimus enim reprehenderit nobis ratione consequuntur deleniti nesciunt doloribus vitae corrupti alias, eveniet optio libero illo placeat quasi. Quis aut fugit eum veritatis laborum, rem omnis repellat odit dolorum dicta at soluta officia error odio id et, eos eligendi perspiciatis iste est hic maiores assumenda placeat! Animi eius facilis dignissimos, quibusdam voluptates perspiciatis molestiae, illum veritatis in beatae ab! Quas veniam vero vel aspernatur doloribus voluptas error debitis? Vel rem aspernatur incidunt nisi! Nisi, consequatur esse quis, reiciendis maiores facere veritatis assumenda numquam porro architecto repudiandae fugiat nostrum omnis aut facilis, sed repellendus qui! Harum maxime illum est temporibus tenetur incidunt doloremque odio, dolores vel cumque atque quibusdam laboriosam facilis repellat accusantium sequi expedita tempore veniam aperiam aut. Repellat asperiores expedita, porro obcaecati esse laboriosam in commodi aut aliquid incidunt, excepturi et? Aspernatur blanditiis dolores ullam dolorum dolore nam dicta sequi, perferendis possimus numquam alias unde illo reiciendis, earum libero minima provident. Atque eum voluptas accusamus facilis commodi officiis provident nemo iusto deleniti, molestiae ullam rem eaque, unde, sunt ipsa? Praesentium laudantium dicta molestiae ex asperiores ipsum voluptatum, repudiandae reprehenderit, iste repellat vitae, sit laboriosam doloremque. Veniam deserunt saepe rem, voluptas possimus magni corporis libero officiis veritatis in quos quidem eum minima incidunt eius ipsa quo! Tenetur culpa sit veritatis doloribus, nesciunt illo quia officiis minima, eos dignissimos excepturi voluptatem, atque eum sunt tempora tempore a iure consectetur magni fugit eligendi. Cumque aliquam at eveniet. Id laborum nihil ipsum, ut provident dolor voluptas quod quaerat maxime consequatur autem sequi totam minus. Reiciendis ipsa minus quia aliquam, iste expedita sequi, eligendi soluta ducimus minima eveniet! Laudantium quod numquam repudiandae fuga illum velit mollitia placeat perferendis deleniti quisquam amet iusto sint tempore ipsam quia fugiat, eligendi dignissimos maiores officia odio dolores molestias non? Rem illum ullam ratione dolore est, laborum at earum, magnam cumque corporis ab odio cupiditate id dignissimos adipisci eligendi fugiat quasi et iure possimus, nam culpa voluptates. Porro totam quaerat saepe perferendis reiciendis ipsa dolores?

<div class="navbar sticky bdrb">

    <div class="container">

        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ config('naykel.logo.path') }}" alt="{{ config('app.name') }}"
                    height="{{ config('naykel.logo.height') }}" width="{{ config('naykel.logo.width') }}"></a>
        </div>

        <div class="flex va-c to-md:hide">
            {{-- <x-gt-menu layout="hover" class="gap-1" itemClass="nav-item rounded-05">
                <li>
                    <a href="https://github.com/naykel76/" target="_blank">
                        <x-gt-icon-github class="icon txt-muted" />
                    </a>
                </li>
            </x-gt-menu> --}}
            <x-gt-menu layout="hover" class="gap-1" itemClass="nav-item rounded-05" />
            <div class="ml">

                <a href="https://github.com/naykel76/" target="_blank">
                    <x-gt-icon-github class="icon txt-muted" />
                </a>
            </div>
        </div>

    </div>

    <div class="md:hide mxy-0">
        <x-gt-sidebar layout="burger-button-main" />
    </div>

</div>
