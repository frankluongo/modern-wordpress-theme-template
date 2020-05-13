export async function dataService(url) {
  const res = await fetch(url);
  const data = await res.json();
  return data;
}
