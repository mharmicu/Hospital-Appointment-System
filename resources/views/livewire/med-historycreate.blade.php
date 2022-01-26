<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?
        <div class="inline-block align-bottom bg-blue-100 rounded-lg text-left overflow-hidden -xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-blue-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-green-500 text-sm font-bold mb-2">Medical History</label>
                            <input type="text" autocomplete="off" class="appearance-none border-green-200 rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Input medical history" wire:model="med_history" list="med_history">
                            <datalist id="med_history">
                                <option>Abnormal EKG</option>
                                <option>Anemia</option>
                                <option>Anigma Pectoris</option>
                                <option>Asthma</option>
                                <option>Bone Disease</option>
                                <option>Breast Lump</option>
                                <option>Cancer - Type: </option>
                                <option>Coronary Artery Disease (Heart Disease)</option>
                                <option>Decreased Libido</option>
                                <option>Depression</option>
                                <option>Diabetes Type I</option>
                                <option>Diabetes Type II</option>
                                <option>Dyslipidemia (High Cholesterol)</option>
                                <option>Emphysema</option>
                                <option>Endocrine Disorder</option>
                                <option>Gallbladder Disease</option>
                                <option>Heart Attack</option>
                                <option>Hepatitis</option>
                                <option>Hypertension (High Blood Pressure)</option>
                                <option>Hyperthyroidism (Overactive Thyroid)</option>
                                <option>Hypothyroidism (Underactive Thyroid)</option>
                                <option>Impotence/ED</option>
                                <option>Infertility</option>
                                <option>Kidney Disease</option>
                                <option>Kidney Stones</option>
                                <option>Meningitis</option>
                                <option>Mental Illness</option>
                                <option>Migraines</option>
                                <option>Nipple Discharge</option>
                                <option>Osteoporosis</option>
                                <option>Phlebitis</option>
                                <option>Postmenopausal Bleeding</option>
                                <option>Seizures</option>
                                <option>Serious Injury</option>
                                <option>Stomach Ulcer</option>
                                <option>Stroke</option>
                                <option>Thyroid Cancer</option>
                                <option>Thyroid Nodule</option>
                                <option>Tuberculosis</option>
                                <option>Other (please specify): </option>
                            </datalist>
                            @error('med_history') <span class="text-red-500">{{ $message }}</span>@enderror

                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-green-500 text-sm font-bold mb-2">Surgical History</label>
                            <input type="text" autocomplete="off" class="appearance-none border-green-200 rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Have you had surgery?" wire:model="surg_history" list="surg_history">
                            <datalist id="surg_history">
                                <option>None</option>
                                <option>CABG</option>
                                <option>PTCA </option>
                                <option>Leg bypass </option>
                                <option>Peripheral Angioplasty </option>
                                <option>AAA </option>
                                <option>Carotid artery surgery </option>
                                <option>Other (please specify): </option>
                            </datalist>
                            @error('surg_history') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-green-500 text-sm font-bold mb-2">Medications</label>
                            <input type="text"  autocomplete="off" class="appearance-none border-green-200 rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="List all medicines and supplements you take" wire:model="medications">
                            @error('medications') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-green-500 text-sm font-bold mb-2">Allergies</label>
                            <input type="text" autocomplete="off" class="appearance-none border-green-200 rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Are you allergic to any medications?" wire:model="allergies" list="allergies">
                            <datalist id="allergies">
                                <option>None</option>
                                <option>Antibotics -- amoxicillin (Moxatag), ampicillin, penicillin (Bicillin L-A), tetracycline, and others</option>
                                <option>Nonsteroidal anti-inflammatory drugs like ibuprofen and naproxen</option>
                                <option>Aspirin</option>
                                <option>Sulfa drugs</option>
                                <option>Chemotherapy drugs</option>
                                <option>Monoclonal antibody therapy -- cetuximab (Erbitux), rituximab (Rituxian and others</option>
                                <option>HIV drugs -- abacavir (Ziagen), nevirapine (Viramune), and others</option>
                                <option>Insulin</option>
                                <option>Antiseizure drugs -- carbamazepine (Tegretol), lamotrigine (Lamictal), phenytoin, and others</option>
                                <option>Muscle relaxers given by IV -- atracurium, succinylcholine, or vecuronium</option>
                                <option>Other (please specify): </option>
                            </datalist>
                            @error('allergies') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-group">
                            <label for="exampleFormControlInput1" class="block text-green-500 text-sm font-bold mb-2">Date</label>
                            <input type="date" class="appearance-none border-green-200 rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline form-control" id="exampleFormControlInput1" wire:model="date">
                            @error('date') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>



                    </div>
                </div>
                <div class="bg-blue-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md -sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border-green-200 border-transparent px-4 py-2 bg-green-500 text-base leading-6 font-medium text-white -sm hover:bg-green-300 focus:outline-none focus:border-green-200-green-700 focus:-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Save
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md -sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border-red-200  px-4 py-2 bg-red-500 text-base leading-6 font-medium text-white -sm hover:text-red-400 focus:outline-none focus:border-green-200 focus:-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 hover:bg-red-300">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>