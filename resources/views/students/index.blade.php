<x-layout>
<div class="container mx-auto px-4 py-8">
  <!-- Header Section -->
  <header class="bg-[#002d72] text-white rounded-lg shadow-md mb-8">
    <div class="container mx-auto px-6 py-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="mb-6 md:mb-0">
          <h1 class="text-3xl font-bold">Student Management System</h1>
          <p class="text-blue-100 mt-2">Manage student records efficiently and securely</p>
        </div>
        <div class="flex items-center space-x-4">
          <div class="bg-[#1f4d92] p-2 rounded-full">
            <i class="fas fa-user-circle text-3xl"></i>
          </div>
          <div>
            <p class="font-semibold">Administrator</p>
            <p class="text-blue-100 text-sm">admin@example.com</p>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Main Content -->
  <div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <!-- Page Title and Actions -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
      <h2 class="text-2xl font-bold text-[#002d72] mb-4 md:mb-0">Manage Students</h2>
      <button onclick="openModal()" class="bg-[#002d72] hover:bg-[#1f4d92] text-white font-semibold px-4 py-2 rounded-md transition-all flex items-center">
        <i class="fas fa-plus-circle mr-2"></i> Add New Student
      </button>
    </div>
    
    <!-- Search and Filter Section -->
    <form method="GET" action="{{ route('students.index') }}" class="bg-gray-50 p-4 rounded-lg mb-6">
      <div class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 md:space-y-0">
        
        <!-- Search Input -->
        <div class="w-full md:w-1/2 flex items-center relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
            <i class="fas fa-search"></i>
          </span>
          <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search by name or email..." 
            class="pl-10 pr-3 py-2 w-full border rounded-md focus:ring-2 focus:ring-[#2d5ba9] focus:border-[#2d5ba9]"
          >
        </div>

        <!-- Search Button -->
        <div>
          <button 
            type="submit" 
            class="bg-[#002d72] hover:bg-[#1f4d92] text-white font-semibold px-6 py-2 rounded-md transition-all w-full md:w-auto ml-0 md:ml-4"
          >
            Search
          </button>
        </div>

      </div>
    </form>
    
    <!-- Flash message -->
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6">
      <div class="flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        <p>{{ session('success') }}</p>
      </div>
    </div>
    @endif
    
    <!-- Table -->
    <div class="overflow-x-auto rounded-lg shadow">
      <table class="w-full text-left">
        <thead class="bg-[#002d72] text-white">
          <tr>
            <th class="p-4 font-semibold text-sm">ID</th>
            <th class="p-4 font-semibold text-sm">Name</th>
            <th class="p-4 font-semibold text-sm">Email</th>
            <th class="p-4 font-semibold text-sm">Date of Birth</th>
            <th class="p-4 font-semibold text-sm">Passport Number</th>
            <th class="p-4 font-semibold text-sm">Role</th>
            <th class="p-4 font-semibold text-sm text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse ($students as $student)
          <tr class="hover:bg-gray-50">
            <td class="p-4 font-semibold">{{ $student->id }}</td>
            <td class="p-4 font-medium text-gray-900">{{ $student->name }}</td>
            <td class="p-4">{{ $student->email }}</td>
            <td class="p-4">{{ $student->date_of_birth ? $student->date_of_birth : 'N/A' }}</td>
            <td class="p-4">{{ $student->passport_number ? $student->passport_number : 'N/A' }}</td>
            <td class="p-4">
              <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $student->role == 'admin' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                {{ ucfirst($student->role) }}
              </span>
            </td>
            <td class="p-4 text-center">
              <div class="flex justify-center space-x-2">
                <button onclick="openModal({{ $student->id }}, '{{ $student->name }}', '{{ $student->email }}', '{{ $student->date_of_birth }}', '{{ $student->passport_number }}', '{{ $student->role }}')" class="text-blue-500 hover:text-blue-700">
                  <i class="fas fa-edit"></i>
                </button>
                <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Are you sure you want to delete this student?')" class="text-red-500 hover:text-red-700">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" class="p-4 text-center text-gray-500">
              No students found.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    
    <!-- Pagination -->
    <div class="flex items-center justify-between mt-6">
      <div class="text-sm text-gray-700">
        Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} results
      </div>
      <div class="flex space-x-2">
        @if ($students->onFirstPage())
        <span class="flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
          Previous
        </span>
        @else
        <a href="{{ $students->previousPageUrl() }}" class="flex items-center px-4 py-2 text-sm font-medium text-[#002d72] bg-gray-100 rounded-md hover:bg-gray-200">
          Previous
        </a>
        @endif
        
        @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
          @if ($page == $students->currentPage())
          <span class="px-4 py-2 text-sm font-medium text-white bg-[#002d72] rounded-md">
            {{ $page }}
          </span>
          @else
          <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium text-[#002d72] bg-gray-100 rounded-md hover:bg-gray-200">
            {{ $page }}
          </a>
          @endif
        @endforeach
        
        @if ($students->hasMorePages())
        <a href="{{ $students->nextPageUrl() }}" class="flex items-center px-4 py-2 text-sm font-medium text-[#002d72] bg-gray-100 rounded-md hover:bg-gray-200">
          Next
        </a>
        @else
        <span class="flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
          Next
        </span>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Edit Student Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-11/12 md:max-w-md shadow-lg rounded-md bg-white">
    <div class="mt-3">
      <!-- Modal header -->
      <div class="flex justify-between items-center pb-3 border-b">
        <h3 class="text-xl font-semibold text-[#002d72]" id="modalTitle">Edit Student</h3>
        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
          <i class="fas fa-times"></i>
        </button>
      </div>
      
      <!-- Modal body -->
      <form id="studentForm" method="POST" action="#" class="mt-4">
    @csrf
    <input type="hidden" name="_method" value="PUT" id="formMethod">
    <input type="hidden" name="student_id" id="studentId">
    
    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
        <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#2d5ba9]" required>
    </div>
    
    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
        <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#2d5ba9]" required>
    </div>
    
    <!-- Password Field - Different for Create vs Edit -->
    <div class="mb-4" id="passwordFieldCreate">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
        <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#2d5ba9]" required>
        <p class="text-xs text-gray-500 mt-1">Password must be at least 8 characters</p>
    </div>
    
    <div class="mb-4 hidden" id="passwordFieldEdit">
        <label for="password_edit" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
        <input type="password" id="password_edit" name="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#2d5ba9]" placeholder="Enter new password to change">
        <p class="text-xs text-gray-500 mt-1">Leave blank to keep current password</p>
    </div>
    
    <div class="mb-4">
        <label for="date_of_birth" class="block text-gray-700 text-sm font-bold mb-2">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#2d5ba9]">
    </div>
    
    <div class="mb-4">
        <label for="passport_number" class="block text-gray-700 text-sm font-bold mb-2">Passport Number:</label>
        <input type="text" id="passport_number" name="passport_number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#2d5ba9]">
    </div>
    
    <div class="mb-4">
        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
        <select id="role" name="role" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#2d5ba9]">
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    
    <!-- Modal footer -->
    <div class="flex justify-end pt-4 border-t">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 mr-2">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-[#002d72] text-white rounded-md hover:bg-[#1f4d92]">Save Changes</button>
    </div>
</form>

    </div>
  </div>
</div>

<script>
  // Modal functions
  function openModal(studentId = null, name = '', email = '', dateOfBirth = '', passportNumber = '', role = 'student') {
    const modal = document.getElementById('editModal');
    const form = document.getElementById('studentForm');
    const title = document.getElementById('modalTitle');
    const methodInput = document.getElementById('formMethod');
    const passwordCreate = document.getElementById('passwordFieldCreate');
    const passwordEdit = document.getElementById('passwordFieldEdit');
    
    if (studentId) {
      // Editing existing student
      title.textContent = 'Edit Student';
      methodInput.value = 'PUT';
      form.action = '/students/' + studentId;
      
      // Show edit password field, hide create password field
      passwordCreate.classList.add('hidden');
      passwordEdit.classList.remove('hidden');
      
      // Populate form with student data
      document.getElementById('studentId').value = studentId;
      document.getElementById('name').value = name;
      document.getElementById('email').value = email;
      document.getElementById('date_of_birth').value = dateOfBirth;
      document.getElementById('passport_number').value = passportNumber;
      document.getElementById('role').value = role;
      document.getElementById('password_edit').value = '';
    } else {
      // Adding new student
      title.textContent = 'Add New Student';
      methodInput.value = 'POST';
      form.action = '/students';
      
      // Show create password field, hide edit password field
      passwordCreate.classList.remove('hidden');
      passwordEdit.classList.add('hidden');
      
      // Clear form
      form.reset();
    }
    
    modal.classList.remove('hidden');
  }

  function closeModal() {
    document.getElementById('editModal').classList.add('hidden');
  }

  // Close modal if clicked outside
  window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target === modal) {
      closeModal();
    }
  }
</script>
</x-layout>