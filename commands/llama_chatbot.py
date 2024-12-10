import sys
from transformers import LLaMAForCausalLM, LLaMATokenizer

def generate_response(prompt):
    model_name = "huggingface/llama"
    tokenizer = LLaMATokenizer.from_pretrained(model_name)
    model = LLaMAForCausalLM.from_pretrained(model_name)

    inputs = tokenizer(prompt, return_tensors="pt")
    outputs = model.generate(inputs["input_ids"], max_length=50)
    response = tokenizer.decode(outputs[0], skip_special_tokens=True)
    return response

if __name__ == "__main__":
    prompt = sys.argv[1]
    response = generate_response(prompt)
    print(response)