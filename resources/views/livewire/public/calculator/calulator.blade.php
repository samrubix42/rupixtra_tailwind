<div>


    <style>
        .range-slider {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 999px;
            background: #dbeafe;
            outline: none;
        }

        .range-slider::-webkit-slider-runnable-track {
            height: 6px;
            border-radius: 999px;
            background: #1e3a8a;
        }

        .range-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 22px;
            height: 22px;
            background: #1e3a8a;
            border-radius: 50%;
            cursor: pointer;
            margin-top: -8px;
        }

        .range-slider::-moz-range-track {
            height: 6px;
            background: #1e3a8a;
            border-radius: 999px;
        }

        .range-slider::-moz-range-thumb {
            width: 22px;
            height: 22px;
            background: #1e3a8a;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>

    <section class="bg-cyan py-16 max-w-7xl mx-auto px-4 sm:px-6 ">


        <div class="px-2 sm:px-8 lg:px-16 mb-10  text-left">
            <span class="text-blue font-bold  tracking-widest uppercase
                     text-2xl md:text-4xl">
                Calculator
            </span>

            <!-- underline -->
            <div class="w-16 h-1.5  bg-zinc-700 rounded mt-2 mb-6"></div>
        </div>

        <div x-data="loanCalculator()" class="max-w-6xl mx-auto px-4 sm:px-6">

            <!-- Tabs -->
            <div class="flex flex-wrap gap-4 mb-12 justify-center lg:justify-start">
                <template x-for="type in ['Personal','Home','Car']">
                    <button
                        @click="changeType(type)"
                        class="px-6 py-3 rounded-lg font-semibold border transition"
                        :class="loanType === type
                    ? 'bg-[#18b8bd] text-blue border-[#18b8bd]'
                    : 'bg-transparent border-gray-400 text-gray-700 hover:border-[#18b8bd]'"
                        x-text="`${type.toUpperCase()} LOAN`">
                    </button>
                </template>
            </div>

            <div class="grid lg:grid-cols-3 gap-10">

                <!-- LEFT SIDE -->
                <div class="lg:col-span-2 bg-[#bfe3e6] rounded-3xl p-8 shadow-lg space-y-10">

                    <!-- Loan Amount -->
                    <div>
                        <h3 class="text-2xl font-semibold text-[#1e3a8a] mb-4">
                            Loan Amount
                        </h3>

                        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center mb-4">
                            <input type="range"
                                :min="minAmount"
                                :max="maxAmount"
                                step="1000"
                                x-model="amount"
                                class="range-slider">

                            <div class="relative w-full sm:w-32">

                                <span class="absolute left-3 top-1/2 -translate-y-1/2 
                 text-zinc-700 font-semibold">
                                    ₹
                                </span>


                                <input type="number"
                                    x-model.number="amount"
                                    :min="minAmount"
                                    :max="maxAmount"
                                    step="1000"
                                    class="w-full sm:w-36 px-4 py-2 text-right
                                      bg-white/70 border border-[#1e3a8a]/20
                                      rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e3a8a]/30">
                            </div>




                        </div>


                    </div>

                    <!-- Interest Rate -->
                    <div>
                        <h3 class="text-2xl font-semibold text-[#1e3a8a] mb-4">
                            Interest Rate
                        </h3>

                        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center mb-4">
                            <input type="range"
                                :min="minRate"
                                :max="maxRate"
                                step="0.1"
                                x-model="rate"
                                class="range-slider">

                            <input type="number"
                                x-model.number="rate"
                                step="0.1"
                                :min="minRate"
                                :max="maxRate"
                                class="w-full sm:w-32 px-4 py-2 text-right
                                     bg-cyan border border-zinc-600
                                      rounded-lg  focus:ring-zinc-600">
                        </div>


                    </div>

                    <!-- Tenure -->
                    <div>
                        <h3 class="text-2xl font-semibold text-[#1e3a8a] mb-4">
                            Tenure (Months)
                        </h3>

                        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center mb-4">

                            <input type="range"
                                :min="minTenure"
                                :max="maxTenure"
                                x-model="tenure"
                                class="range-slider">

                            <input type="number"
                                x-model.number="tenure"
                                :min="minTenure"
                                :max="maxTenure"
                                class="w-full sm:w-32 px-4 py-2 text-right
                                      bg-white/70 border border-[#1e3a8a]/20
                                      rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e3a8a]/30">
                        </div>

                    </div>

                </div>

                <!-- RIGHT SIDE EMI CARD -->
                <div class="bg-[#bfe3e6] rounded-3xl p-8 shadow-lg space-y-6">

                    <div>
                        <p class="text-xl text-center font-semibold text-[#1e3a8a]">
                            Your Monthly EMI
                        </p>

                        <p class="text-4xl text-center font-bold text-[#1e3a8a] mt-3">
                            ₹ <span x-text="emi.toLocaleString('en-IN')"></span>
                        </p>
                    </div>

                    <div class="bg-[#18b8bd] text-blue rounded-xl py-4 text-center font-semibold shadow-md">
                        Total Payable <br>
                        ₹ <span x-text="totalPayable.toLocaleString('en-IN')"></span>
                    </div>

                    <div class="bg-[#18b8bd] text-blue rounded-xl py-4 text-center font-semibold shadow-md">
                        Tenure <br>
                        <span x-text="tenure"></span> Months
                    </div>

                    <div class="space-y-3 text-sm pt-4">
                        <div class="flex justify-between">
                            <span>Principal</span>
                            <span>₹ <span x-text="amount.toLocaleString('en-IN')"></span></span>
                        </div>

                        <div class="flex justify-between">
                            <span>Total Interest</span>
                            <span>₹ <span x-text="totalInterest.toLocaleString('en-IN')"></span></span>
                        </div>
                    </div>

                    <a wire:navigate href="{{route('reach-us')}}"
                        class="block text-center bg-[#18b8bd] text-blue py-3 rounded-lg font-semibold mt-6 hover:opacity-90 transition">
                        APPLY FOR LOAN
                    </a>

                </div>

            </div>

        </div>

    </section>




    <!-- Alpine Logic -->
    <script>
        function loanCalculator() {
            return {
                loanType: 'Personal',

                amount: 50000,
                rate: 9.99,
                tenure: 12,

                minAmount: 50000,
                maxAmount: 4000000,

                minRate: 7,
                maxRate: 22,

                minTenure: 12,
                maxTenure: 84,
                tenureType: 'Months',

                get emi() {
                    let P = this.amount;
                    let r = this.rate / 12 / 100;
                    let n = this.tenure;

                    if (r === 0) return Math.round(P / n);

                    let emi = P * r * Math.pow(1 + r, n) /
                        (Math.pow(1 + r, n) - 1);
                    return Math.round(emi);
                },

                get totalPayable() {
                    return this.emi * this.tenure;
                },

                get totalInterest() {
                    return this.totalPayable - this.amount;
                },

                changeType(type) {
                    this.loanType = type;

                    if (type === 'Personal') {
                        this.amount = 50000;
                        this.rate = 9.99;
                        this.tenure = 12;
                        this.minAmount = 50000;
                        this.maxAmount = 4000000;
                        this.minRate = 9;
                        this.maxRate = 22;
                        this.minTenure = 12;
                        this.maxTenure = 84;
                        this.tenureType = 'Months';
                    }

                    if (type === 'Home') {
                        this.amount = 300000;
                        this.rate = 7.75;
                        this.tenure = 12;
                        this.minAmount = 300000;
                        this.maxAmount = 50000000;
                        this.minRate = 7;
                        this.maxRate = 12;
                        this.minTenure = 1;
                        this.maxTenure = 30;
                        this.tenureType = 'Years';
                    }

                    if (type === 'Car') {
                        this.amount = 100000;
                        this.rate = 7;
                        this.tenure = 12;
                        this.minAmount = 100000;
                        this.maxAmount = 10000000;
                        this.minRate = 7;
                        this.maxRate = 17.5;
                        this.minTenure = 12;
                        this.maxTenure = 84;
                        this.tenureType = 'Months';
                    }

                    if (this.tenureType === 'Years') {
                        this.tenure = this.tenure * 12;
                    }
                }
            }
        }
    </script>
</div>