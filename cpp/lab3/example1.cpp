#include <iostream>

double beta(double a, double b);

int main() {
	std::setlocate(LC_ALL, "rus");

	double a = 0, b = 0, p = 0;

	std::cout << "\n������ ������ ����� a = ";
	std::cin >> a;
	std::cout << "\n������ ������ ����� b = ";
	std::cin >> b;

	p = beta(a, b);


	std::cout << "\n������������ p = " << p << std::endl;

	return 0;
}

double beta(double a, double b) {
	return a * b;
}
