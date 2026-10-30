
@csrf

<div>
    <label for="name">Produkta nosaukums</label>
    <input
        id="name"
        type="text"
        name="name"
        value="{{ old('name', $product->name ?? '') }}"
        required
    >
    @error('name')
        <p>{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="quantity">Daudzums</label>
    <input
        id="quantity"
        type="number"
        name="quantity"
        min="0"
        value="{{ old('quantity', $product->quantity ?? 0) }}"
        required
    >
    @error('quantity')
        <p>{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="description">Apraksts</label>
    <textarea
        id="description"
        name="description"
    >{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <p>{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="expiration_date">Derīguma termiņš</label>
    <input
        id="expiration_date"
        type="date"
        name="expiration_date"
        value="{{ old('expiration_date', $product->expiration_date ?? '') }}"
    >
    @error('expiration_date')
        <p>{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="status">Statuss</label>
    <select id="status" name="status" required>
        <option value="active"
            {{ old('status', $product->status ?? 'active') == 'active' ? 'selected' : '' }}>
            Aktīvs
        </option>

        <option value="inactive"
            {{ old('status', $product->status ?? 'active') == 'inactive' ? 'selected' : '' }}>
            Neaktīvs
        </option>
    </select>
    @error('status')
        <p>{{ $message }}</p>
    @enderror
</div>

<button type="submit">Saglabāt</button>

<a href="{{ route('products.index') }}">Atcelt</a>
