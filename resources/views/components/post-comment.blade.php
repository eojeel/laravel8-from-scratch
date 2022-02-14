<article class="flex  bg-gray-100 p-6 rounded-xl border-grey-200 space-x-4">
                <div class="flex-shrink-0">
                    <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" alt="" width="60" height="60" class="rounded-xl">
                </div>

                <div>
                    <header class="mb-4">
                        <h3 class="font-bolt">{{ $comment->author->username }}</h3>
                        <p class="text-xs">Posted
                            <time>{{ $comment->created_at }}</time>
                        </p>
                    </header>
                    <p>{{ $comment->body }}</p>
                </div>

            </article>
