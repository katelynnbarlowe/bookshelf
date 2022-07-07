<template>
    <container>
        <Heading class="mt-24 mb-3">choose my next read</Heading>
        <div class="inner border-2 border-color-grey p-6">
            <div class="flex">
                <div class="filters w-3/5">
                    <div class="mb-3">
                        <label class="text-lg font-normal">included shelves</label>
                        <div class="flex flex-wrap gap-x-1 -ml-2">
                            <label
                                :for="`shelf${shelf.id}`"
                                class="lowercase px-2 hover:bg-yellow cursor-pointer"
                                :class="{ 'bg-yellow': selectedShelves.includes(shelf.id) }"
                                v-for="shelf in shelves"
                                :key="shelf.id"
                            >
                                <input
                                    type="checkbox"
                                    :id="`shelf${shelf.id}`"
                                    :value="shelf.id"
                                    v-model="selectedShelves"
                                    class="sr-only"
                                />
                                {{ shelf.name }}
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-lg font-normal">minimum average rating</label>
                        <div class="flex align-items-start">
                            <div class="range-field w-9/12">
                                <input
                                    type="range"
                                    class="form-range block h-6 border-0 bg-transparent appearance-none w-full"
                                    min="0"
                                    max="5"
                                    step=".25"
                                    id="minimumAverageRating"
                                    v-model="minimumAverageRating"
                                    @change=""
                                />
                            </div>
                            <div class="w-2/12">
                                <span class="pl-2">{{ minimumAverageRating }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-lg font-normal">maximum number of pages</label>
                        <div class="flex align-items-start">
                            <div class="range-field w-9/12">
                                <input
                                    type="range"
                                    class="form-range block h-6 border-0 bg-transparent appearance-none w-full"
                                    min="0"
                                    max="1200"
                                    step="25"
                                    id="maximumPages"
                                    v-model="maximumPages"
                                    @change=""
                                />
                            </div>
                            <div class="w-2/12">
                                <span class="pl-2">{{ maximumPages ? maximumPages : 'none' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-8">
                        <label class="text-lg font-normal">publication date range</label>
                        <div class="flex align-items-start">
                            <div class="range-field w-9/12">
                                <MultiRangeSlider
                                    :min="dateMin"
                                    :max="dateMax"
                                    :step="2"
                                    :ruler="false"
                                    :label="false"
                                    :minValue="dateLowerRange"
                                    :maxValue="dateUpperRange"
                                    @input="updateDates"
                                />
                            </div>
                            <div class="w-2/12">
                                <span class="pl-2">{{ `${dateLowerRange} - ${dateUpperRange}` }}</span>
                            </div>
                        </div>
                    </div>
                    <button class="w-full bg-green text-xl text-white py-4 leading-5 hover:opacity-80">
                        pick a book
                        <br />
                        <span class="text-xs">of {{ results.count }} results</span>
                    </button>
                </div>
                <div class="book w-2/5">sldfkjsdflk</div>
            </div>
        </div>
    </container>
</template>
<script>
import Container from './Container';
import Heading from './Heading';
import MultiRangeSlider from 'multi-range-slider-vue';

export default {
    components: { Heading, Container, MultiRangeSlider },
    data() {
        return {
            selectedShelves: [],
            minimumAverageRating: 0,
            maximumPages: 0,
            dateMin: 1500,
            dateMax: 2022,
            dateLowerRange: 1900,
            dateUpperRange: 2022,
            results: [],
        };
    },
    mounted() {
        this.dateMax = new Date().getFullYear();
        this.dateUpperRange = this.dateMax;
    },
    props: {
        shelves: {
            required: true,
            type: Array,
        },
    },
    methods: {
        updateDates(e) {
            this.dateLowerRange = e.minValue;
            this.dateUpperRange = e.maxValue;
        },
        retrieveResults() {},
    },
};
</script>
