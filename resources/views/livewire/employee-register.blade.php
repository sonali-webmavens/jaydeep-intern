<div>
    <center>
       
            <h1>student registration</h1>

        <button onclick="window.location.href='{{ url('/employee-list') }}'">Employee List</button><br><br>

            @if(session()->has('success'))
                <p style="color:green;">{{session('success')}}</p>
            @endif
            <form wire:submit.prevent="submit">

                name:<input type="text" wire:model="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
                <br>
                <br>

                email:<input type="email" wire:model="email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
                <br>
                <br>

                Phone:<input type="tel" wire:model="phone" >
                @error('phone') <span class="error">{{ $message }}</span> @enderror
                <br>
                <br>

                <button type="submit">save</button>

            </form>
       
    </center>
</div>