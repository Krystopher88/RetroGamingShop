<template>
    <nav class="py-2 text-slate-700">
        <!-- Start Top NavBar, always visible -->
        <div class="grid grid-rows-1 py-2">
            <div class="grid grid-cols-2 items-center px-6">
                <div class="flex items-center gap-10">
                    <a href="#" class="text-2xl">RetroGamingShop</a>
                    <div class="flex w-full items-center">
                        <input class="w-full rounded-l-lg" type="search" placeholder="Rechercher un jeu ..."
                            aria-label="Rechercher un jeu ..." aria-describedby="search-icon" />
                        <button type="button" id="search-icon" class="border px-2 py-1 rounded-r ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-8 w-8">
                                <path fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-evenly text-xl ">
                        <a href="#" class="flex items-center transition duration-200 hover:text-neutral-400">
                            <font-awesome-icon class="mr-4 text-4xl" :icon="['fas', 'user-secret']" />
                            <span>Mon Compte</span>
                        </a>
                        <a href="#" class="flex items-center transition duration-200 hover:text-neutral-400">
                            <font-awesome-icon class="mr-4 text-4xl" :icon="['fas', 'cart-shopping']" />
                            <span>Panier</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Top NavBar-->
        <!-- Start Left NavBar, always visible -->
        <div class="grid grid-rows-1">
            <div class="grid grid-cols-8 text-center">
                <!-- Start Main Menu-->
                <div class="col-span-1 border border-orange-600">
                    <aside>
                        <nav>
                            <ul>
                                <li class="border bg-amber-100 min-h-20 flex items-center justify-center">
                                    Gaming
                                </li>
                                <li class="border bg-yellow-100 min-h-20 flex items-center justify-center">
                                    Retro
                                </li>
                                <li class="border bg-lime-100 min-h-20 flex items-center justify-center">
                                    Culture Geek
                                </li>
                            </ul>
                        </nav>
                    </aside>
                </div>
                <!-- End Main Menu-->
                <div class="col-span-7 border border-yellow-600 bg-yellow-200">
                <!-- Cover location linked to main menu items -->
                </div>
            </div>
            <div class="grid grid-cols-8">
                <!-- Start Sub Menu-->
                <div class="col-span-1 border border-orange-600 px-2">
                    <div>
                        <h2>Filtre par plateforme</h2>
                        <ul class="text-justify ml-10">
                            <li>Playstation</li>
                            <li>Super Nintendo</li>
                            <li>Nintendo 64</li>
                            <li>Saturn</li>
                            <li>Dreamcast</li>
                            <li>+ En voir plus</li>
                        </ul>
                    </div>
                    <div>
                        <h2>Filtre par genre</h2>
                        <ul class="text-justify ml-10">
                            <li>Plateforme</li>
                            <li>Course</li>
                            <li>Combat</li>
                            <li>Shoot'em up</li>
                            <li>Beat'em all</li>
                            <li>+ En voir plus</li>
                        </ul>
                    </div>
                    
                </div>
                <!-- End Sub Menu-->
                <div class="col-span-7 border border-yellow-600 bg-yellow-200">
                    <!-- product carousel location -->
                    <!-- changes the view, when using the submenu -->>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import {

} from "tw-elements";
export default {
    mounted() {
        initTE({

        });
    }

}
</script>

<style></style>