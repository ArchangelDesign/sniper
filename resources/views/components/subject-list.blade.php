<?php /** @var \App\Entities\Subject $subject */ ?>
@props(['subjects'])

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Subject
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Value
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Bid
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Closing
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($subjects as $subject)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if(empty($subject->getImageUrl()))
                                        <a href="{{$subject->getUrl()}}" target="_blank">
                                            <img class="h-10 w-10 rounded-full" src="https://www.copart.com/images/testImages/lot_NoPhoto.png" alt="">
                                        </a>
                                    @else
                                        <a href="{{$subject->getUrl()}}" target="_blank">
                                            <img class="h-10 w-10 rounded-full" src="{{ $subject->getImageUrl() }}" alt="">
                                        </a>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $subject->getTitle() }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $subject->getPrimaryDamage() }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($subject->getFinished())
                                <div class="text-sm text-gray-900">Sold for: <b>{{ empty($subject->getCurrentBid()) ? 'no bids' : '$' . $subject->getCurrentBid() }} ({{$subject->getSellValuePercentageString()}}%)  {{count($subject->getHistory())}} bids</b></div>
                            @else
                                <div class="text-sm text-gray-900">Current bid: <b>{{ empty($subject->getCurrentBid()) ? 'no bids' : '$' . $subject->getCurrentBid() }}</b></div>
                            @endif
                            <div class="text-sm text-gray-500">Market value {{ $subject->getEstimatedValue() }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($subject->getIsBiddingOpen())
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  OPEN
                </span>
                            @elseif($subject->getFinished())
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                  SOLD
                </span>
                                @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                  FUTURE
                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($subject->getIsBiddingOpen())
                                <div class="text-sm text-gray-900"><b>{{ (new DateTime($subject->getSaleDateTime()))->diff(new DateTime())->format('%d days %H:%I') }}</b></div>
                            <div class="text-sm text-gray-500">{{ $subject->getSaleDateTime() }}</div>
                            @elseif($subject->getFinished())
                                <div class="text-sm text-gray-900"><b>{{ (new DateTime($subject->getSaleDateTime()))->diff(new DateTime())->format('%d days ago') }}</b></div>
                                <div class="text-sm text-gray-500">{{ $subject->getSaleDateTime() }}</div>
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

