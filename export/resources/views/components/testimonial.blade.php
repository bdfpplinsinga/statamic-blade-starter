<figure class="rounded-2xl bg-gray-50 p-8 text-sm/6 dark:bg-white/2.5">
    <blockquote class="text-gray-900 dark:text-gray-100">
        <p>“{{ $slot }}”</p>
    </blockquote>
    <figcaption class="mt-6 flex items-center gap-x-4">
        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-10 rounded-full bg-gray-50 dark:bg-gray-800" />
        <div>
        <div class="font-semibold text-gray-900 dark:text-white">
            {{ $author ?? 'Leslie Alexander' }}
        </div>
        <div class="text-gray-600 dark:text-gray-400">{{ $handle ?? '@lesliealexander' }}</div>
        </div>
    </figcaption>
</figure>