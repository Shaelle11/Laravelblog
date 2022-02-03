<template>
    <Head title="Welcome" />

    <nav id="home" class="py-4 flex sticky top-0 justify-between">
        <div class="shrink-0 flex">
            <Link :href="route('dashboard')">
                <BreezeApplicationLogo class="block h-12 w-auto" />
            </Link>
        </div>
        <!-- left header section -->
        <div class="items-center space-x-8 lg:flex">
            <a
                href="#home"
                class="p-4 active:underline decoration-2 decoration-amber-800 focus:underline focus:decoration-amber-800"
                ><h2 class="">Home</h2></a
            >
            <a
                href="#blog"
                class="m-2 active:underline decoration-2 decoration-amber-800 focus:underline decoration-amber-800"
                >Blogs</a
            >
            <a
                href="#about"
                class="m-2 active:underline decoration-2 decoration-amber-800 focus:underline decoration-amber-800"
                >About Us</a
            >
            <a
                href="#Contact"
                class="m-2 active:underline decoration-2 decoration-amber-800 focus:underline decoration-amber-800"
                >Contact Us</a
            >
        </div>
        <div v-if="canLogin" class="px-6 items-center space-x-4 py-4 sm:block">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="px-4 py-2 text-amber-800 bg-brown rounded-md"
            >
                Dashboard
            </Link>

            <template v-else class="flex space-x-2">
                <Link
                    :href="route('login')"
                    class="px-4 py-2 text-white bg-amber-800 rounded-md hover:bg-white hover:text-amber-800 hover:border-amber-800 hover:border-2"
                >
                    Log in
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="px-2 py-2 text-amber-800 border-amber-800 border-2 rounded-md hover:bg-amber-800 hover:shadow-black hover:text-white"
                >
                    Register
                </Link>
            </template>
        </div>
    </nav>
    <main
        class="bg-gradient-to-r from-orange-800 to-blue-400 h-screen bg-amber-800 p-4"
    >
        <div class="mx-10 mt-40">
            <h1 class="text-white font-lg text-6xl mt-10">Listyst Blog</h1>
        </div>
        <div class="mx-10 mt-5">
            <h5 class="text-white font-semibold text-xl font-sans">
                Blog and Read and share opinions to your heart's content
            </h5>
        </div>
        <div class="text-center grid h-5 w-80 mt-8 mx-8">
            <Link
                v-if="canRegister"
                :href="route('register')"
                class="p-2 rounded-md bg-white text-amber-800 hover:bg-gradient-to-r from-orange-800 to-blue-400 hover:text-white hover:border-white hover:border-2"
                >Get Started</Link
            >
        </div>
    </main>
    <article
        @show="console.log(props.blogs)"
        id="blog"
        class="pt-20 px-10 h-screen grid"
    >
        <main class="p-10">
            <div class="flex w-full h-48 rounded overflow-hidden shadow-lg">
                <img class="w-full" src="lorem" alt="" />
                <div class="px-6 py-4">
                    <h2 class="font-bold text-xl mb-2">
                        Lorem ipsum dolor sit amet.
                    </h2>
                    <p class="text-gray-700 text-base">
                        {Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. A explicabo quos hic facilis numquam quas,
                        corrupti eum accusamus consequuntur similique.
                    </p>
                    <div class="mt-4 px-6 pt-6 pb-2">
                        <Link
                            href=""
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
                            >Read More...</Link
                        >
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
                        >
                            05/10/2020
                        </span>
                    </div>
                </div>
            </div>
        </main>
    </article>

    <main class="text-center h-screen p-10 items-center" id="about">
        <div>
            <Link href="#home">
                <h1
                    class="text-6xl m-10 text-amber-800 underline underline-offset-4 decoration-2 decoration-purple-800 hover:underline-ease-in-out"
                >
                    About Us
                </h1></Link
            >
        </div>
        <section class="w-auto text-center">
            <h4 class="font-semibold">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum
                nemo velit delectus quo obcaecati at placeat doloremque
                cupiditate aliquid commodi quidem distinctio voluptatem vel ad
                amet, dolore voluptate eos, aliquam quae impedit tempore optio!
                Nobis.
            </h4>
        </section>
        <section class="flex justify-around">
            <div class="min-h-96 min-w-96">
                <img
                    :src="require('./assets/Blogging-amico.png')"
                    alt="Image"
                    class="h-32 w-32"
                />
            </div>
        </section>
    </main>

    <footer
        id="Contact"
        class="bg-gradient-to-r from-amber-800 to-white border-t border-gray-200"
    >
        <div
            class="container flex flex-col flex-wrap px-4 py-16 mx-auto md:items-center lg:items-start md:flex-row md:flex-nowrap"
        >
            <div
                class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left"
            >
                <a
                    class="flex items-center justify-center text-4xl font-bold text-blue-700 md:justify-start"
                >
                    <BreezeApplicationLogo class="block h-16 w-auto" />
                </a>
                <p class="mt-2 text-sm text-justify text-white">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Praesentium at sequi cum, impedit fuga in placeat illo eum
                    minima possimus est perferendis distinctio explicabo eos
                    natus consequuntur blanditiis odio optio?
                </p>
                <div class="flex mt-4">
                    <input
                        type="text"
                        class="h-auto p-2 text-sm border border-grey-light round text-grey-dark"
                        placeholder="Your email address"
                    />
                    <button
                        class="h-auto p-3 text-xs text-white bg-amber-800 rounded-sm"
                    >
                        Subscribe
                    </button>
                </div>
                <div class="flex justify-center mt-4 lg:mt-2"></div>
            </div>
            <div class="justify-end w-full mt-6 text-center lg:flex">
                <div class="w-full px-4 lg:w-1/3 md:w-1/2">
                    <h2 class="mb-2 font-bold tracking-widest text-black">
                        Follow Us For more Updates
                    </h2>
                    <h4 class="italic text-amber-800">
                        via our social media Handles
                    </h4>
                    <ul
                        class="flex justify-between text-center space-y-2 text-sm list-none"
                    >
                        <li>
                            <a>
                                <svg
                                    fill="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    class="w-6 h-6 text-amber-800"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
                                    ></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="">
                                <svg
                                    fill="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    class="w-6 h-6 text-violet-600"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
                                    ></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="">
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    class="w-6 h-6 text-amber-800"
                                    viewBox="0 0 24 24"
                                >
                                    <rect
                                        width="20"
                                        height="20"
                                        x="2"
                                        y="2"
                                        rx="5"
                                        ry="5"
                                    ></rect>
                                    <path
                                        d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
                                    ></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="">
                                <svg
                                    fill="currentColor"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="0"
                                    class="w-6 h-6 text-violet-600"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="none"
                                        d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"
                                    ></path>
                                    <circle
                                        cx="4"
                                        cy="4"
                                        r="2"
                                        stroke="none"
                                    ></circle>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex justify-center -mt-12">
            <p class="text-base semibold text-black">
                All rights reserved by @ Listyst Blog 2021
            </p>
        </div>
    </footer>
</template>

<script>
import image1 from "./assets/Blogging-amico.png";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        image1,
        BreezeApplicationLogo,
        Head,
        Link,
    },
    props: {
        blogs: Array,
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },

    data: function () {
        return {
            image: image1,
        };
    },
};
//console.log(props);
</script>
