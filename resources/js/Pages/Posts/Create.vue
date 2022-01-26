<template>
    <Head title="Create" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex m-2 p-2">
                    <Link
                        href="/posts"
                        class="px-4 py-2 bg-blue-500 rounded hover:bg-indigo-600"
                        >Back
                    </Link>
                </div>
                <form
                    @submit.prevent="storePost"
                    class="bg-white shadow-md m-2 p-2 rounded"
                >
                    <div class="mb-4 px-2 w-full">
                        <label class="block mb-1 text-sm" for="post"
                            >Title</label
                        >

                        <textarea
                            id="title"
                            name="title"
                            v-model="form.title"
                            class="w-full border px-4 py-2 rounded focus:border-blue-500 focus:shadow-outline outline-none"
                            rows="2"
                            placeholder="Post Title..."
                        ></textarea>
                    </div>
                    <div class="mb-4 px-2 w-full">
                        <label class="block mb-1 text-sm" for="post"
                            >Content</label
                        >

                        <textarea
                            id="body"
                            v-model="form.body"
                            name="body"
                            class="w-full border px-4 py-2 rounded focus:border-blue-500 focus:shadow-outline outline-none"
                            rows="5"
                            placeholder="Type Here..."
                        ></textarea>
                    </div>
                    <div class="mb-4 px-2 w-full">
                        <label for="post" class="block mb-1 text-sm"
                            >Image</label
                        >
                        <input
                            type="file"
                            name="image"
                            id="image"
                            placeholder="Choose Imaage"
                            @input="form.image = $event.target.files[0]"
                        />
                    </div>
                    <div class="m-2 p-2">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-400 hover:bg-blue-600 rounded"
                        >
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    title: null,
    body: null,
    image: null,
});
function storePost() {
    form.post("/posts", "/");
}
</script>
