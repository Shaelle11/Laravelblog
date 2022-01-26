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
                class="px-4 py-2 text-white bg-brown rounded-md"
            >
                Dashboard
            </Link>

            <template v-else class="flex space-x-2">
                <Link
                    :href="route('login')"
                    class="px-4 py-2 text-white bg-amber-800 rounded-md hover:bg-white hover:text-amber-800"
                >
                    Log in
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="px-2 py-2 text-amber-800 border-amber-800 border-2 rounded-md hover:bg-amber-800 hover:shadow-black hover:text-white hover:bg-black"
                >
                    Register
                </Link>
            </template>
        </div>
    </nav>
    <main
        class="grid bg-gradient-to-r from-orange-800 to-blue-400 h-screen bg-amber-800 p-4"
    >
        <div>
            <h1 class="text-white font-lg text-6xl m-10">Listyst Blog</h1>
        </div>
        <div class="m-10">
            <h5 class="text-white font-semibold text-xl font-sans">
                Blog and Read and share opinions to your heart's content
            </h5>
        </div>
        <div class="m-10">
            <Link
                v-if="canRegister"
                :href="route('register')"
                class="px-2 py-2 my-10 text-white border-white border-2 rounded-md hover:w-5 hover:text-white"
                >Get Started</Link
            >
        </div>
    </main>

    <main class="text-center h-screen p-10 items-center" id="about">
        <div>
            <Link href="#home">
                <h1
                    class="text-6xl m-10 text-gradient-to-r from-orange-800 to-blue-400 underline decoration-2 decoration-amber-800"
                >
                    About Us
                </h1></Link
            >
        </div>
    </main>
</template>

<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeApplicationLogo,
        Head,
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
};
</script>
