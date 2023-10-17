#include <iostream>

double beta(double a, double b);

int main() {
	std::setlocate(LC_ALL, "rus");

	double a = 0, b = 0, p = 0;

	std::cout << "\nВвести первое число a = ";
	std::cin >> a;
	std::cout << "\nВвести второе число b = ";
	std::cin >> b;

	p = beta(a, b);


	std::cout << "\nПроизведение p = " << p << std::endl;

	return 0;
}

double beta(double a, double b) {
	return a * b;
}
