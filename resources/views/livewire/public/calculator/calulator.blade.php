<div>
    <style>
        .range-slider {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 999px;
            background: linear-gradient(to right,
                    #e7c892 0%,
                    #e7c892 40%,
                    #e7c892 40%,
                    #e7c892 100%);
            outline: none;
        }

        /* WebKit Track */
        .range-slider::-webkit-slider-runnable-track {
            height: 6px;
            border-radius: 999px;
        }

        /* WebKit Thumb */
        .range-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            background: #cd954b;
            border-radius: 50%;
            cursor: pointer;
            margin-top: -6px;
        }

        /* Firefox */
        .range-slider::-moz-range-track {
            height: 6px;
            background: #e5e7eb;
            border-radius: 999px;
        }

        .range-slider::-moz-range-progress {
            height: 6px;
            background: #e7c892;
            border-radius: 999px;
        }

        .range-slider::-moz-range-thumb {
            width: 18px;
            height: 18px;
            background: #e7c892;
            border-radius: 50%;
            border: none;
            cursor: pointer;
        }
    </style>
    <section class="relative bg-primary text-white overflow-hidden">
        <!-- Subtle Accent Line -->
        <div class="absolute bottom-0 left-0 w-full h-[3px] bg-secondary"></div>

        <!-- Soft Glow (Very Minimal) -->
        <div class="absolute -top-32 right-20 w-64 h-64 
                bg-secondary/15 blur-[120px] rounded-full"></div>

        <div class="relative max-w-7xl mx-auto px-6 py-12 md:py-14">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                <!-- Title -->
                <div>
                    <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">
                        Loan EMI Calculator
                    </h1>
                    <p class="mt-2 text-white/75 text-sm sm:text-base max-w-xl">
                        Instantly calculate EMI for personal, home and car loans with accurate results.
                    </p>
                </div>

                <!-- Breadcrumb / Context -->
                <div class="text-sm text-white/70">
                    <span class="hover:text-secondary transition cursor-pointer">Home</span>
                    <span class="mx-2">/</span>
                    <span class="text-secondary">EMI Calculator</span>
                </div>

            </div>
        </div>
    </section>
    <div
        x-data="loanCalculator()"
        class="max-w-6xl mx-auto bg-white rounded-2xl p-5 sm:p-6 lg:p-8 border border-gray-200">

        <!-- Tabs -->
        <div class="flex flex-wrap gap-2 sm:gap-3 mb-8 sm:mb-10">
            <template x-for="type in ['Personal','Home','Car']">
                <button
                    @click="changeType(type)"
                    class="px-4 sm:px-5 py-2 rounded-lg text-xs sm:text-sm font-medium border transition"
                    :class="loanType === type
                    ? 'bg-primary text-white border-primary'
                    : 'bg-gray-50 border-gray-300 text-gray-700 hover:border-primary'"
                    x-text="`${type} Loan`">
                </button>
            </template>
        </div>

        <div class="grid gap-8 lg:grid-cols-3 lg:gap-10">

            <!-- LEFT -->
            <div class="lg:col-span-2 space-y-7 sm:space-y-8">

                <!-- Loan Amount -->
                <div>
                    <div class="flex justify-between items-center mb-2 text-xs sm:text-sm font-medium">
                        <label>Loan Amount (₹)</label>

                        <input
                            type="number"
                            x-model.number="amount"
                            :min="minAmount"
                            :max="maxAmount"
                            step="1000"
                            class="w-32 sm:w-40 px-3 py-1.5 text-right
                               border border-gray-300 rounded-md
                               focus:outline-none focus:ring-2 focus:ring-primary/30">
                    </div>

                    <input type="range"
                        :min="minAmount"
                        :max="maxAmount"
                        step="1000"
                        x-model="amount"
                        class="w-full range-slider">
                </div>

                <!-- Interest -->
                <div>
                    <div class="flex justify-between items-center mb-2 text-xs sm:text-sm font-medium">
                        <label>Interest Rate (% p.a)</label>

                        <input
                            type="number"
                            x-model.number="rate"
                            step="0.1"
                            :min="minRate"
                            :max="maxRate"
                            class="w-20 sm:w-24 px-3 py-1.5 text-right
                               border border-gray-300 rounded-md
                               focus:outline-none focus:ring-2 focus:ring-primary/30">
                    </div>

                    <input type="range"
                        :min="minRate"
                        :max="maxRate"
                        step="0.1"
                        x-model="rate"
                        class="w-full range-slider">
                </div>

                <!-- Tenure -->
                <div>
                    <div class="flex justify-between items-center mb-2 text-xs sm:text-sm font-medium">
                        <label>
                            Tenure (<span x-text="tenureType"></span>)
                        </label>

                        <input
                            type="number"
                            x-model.number="tenure"
                            :min="minTenure"
                            :max="maxTenure"
                            class="w-20 sm:w-24 px-3 py-1.5 text-right
                               border border-gray-300 rounded-md
                               focus:outline-none focus:ring-2 focus:ring-primary/30">
                    </div>

                    <input type="range"
                        :min="minTenure"
                        :max="maxTenure"
                        x-model="tenure"
                        class="w-full range-slider">
                </div>

                <!-- EMI Result -->
                <div class="bg-gray-50 rounded-xl p-5 sm:p-6 border border-gray-200
                        flex flex-col sm:flex-row gap-4 sm:items-center sm:justify-between">

                    <div>
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            Monthly EMI
                        </p>
                        <p class="text-2xl sm:text-3xl font-semibold text-primary mt-1 break-all">
                            ₹ <span x-text="emi.toLocaleString('en-IN')"></span>
                        </p>
                    </div>

                    <a wire:navigate href="{{route('reach-us')}}"
                        class="w-full sm:w-auto bg-secondary text-primary font-semibold
                           px-6 py-3 rounded-lg hover:opacity-90 transition">
                        Apply Now
                    </a>
                </div>

            </div>

            <!-- RIGHT SUMMARY -->
            <div class="bg-gray-50 rounded-2xl p-5 sm:p-6 lg:p-8 border border-gray-200 space-y-6">

                <div>
                    <p class="text-xs sm:text-sm text-gray-500">Total Amount Payable</p>
                    <p class="text-2xl sm:text-3xl font-semibold text-primary mt-1 break-all">
                        ₹ <span x-text="totalPayable.toLocaleString('en-IN')"></span>
                    </p>
                </div>

                <div class="border-t pt-5 space-y-4 text-xs sm:text-sm">
                    <div class="flex justify-between gap-4">
                        <span class="text-gray-600">Principal Amount</span>
                        <span class="font-medium text-primary text-right break-all">
                            ₹ <span x-text="amount.toLocaleString('en-IN')"></span>
                        </span>
                    </div>

                    <div class="flex justify-between gap-4">
                        <span class="text-gray-600">Total Interest</span>
                        <span class="font-medium text-accent text-right break-all">
                            ₹ <span x-text="totalInterest.toLocaleString('en-IN')"></span>
                        </span>
                    </div>
                </div>

            </div>

        </div>
    </div>




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