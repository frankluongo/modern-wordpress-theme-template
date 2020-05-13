export async function getData() {
  const res = await fetch("/wp-json");
  const data = await res.json();
  console.log(data);
}
